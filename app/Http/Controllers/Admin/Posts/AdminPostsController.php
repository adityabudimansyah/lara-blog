<?php

namespace App\Http\Controllers\Admin\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\PostsModel;
use App\Repositories\UserRepository;
use App\Repositories\TagsRepository;
use Auth;
use Yajra\Datatables\Datatables;
class AdminPostsController extends Controller
{
    /**
     * AdminPostsController constructor.
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display the list of Posts. If Request is ajax, return json response for dataTables.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request){
        if($request->ajax()){
            $model = PostsModel::query();
            return Datatables::of($model)
                ->addColumn('status',function ($model) use ($request){
                    $statusHtml = ($model->active) ? '<span class="label label-success">Active</span>' :'<span class="label label-danger">Deactivated</span>';
                    return $statusHtml;
                })

                ->addColumn('actions', function ($model) use ($request) {
                    $id = $model->id;
                    $link = $request->url().'/'.$id;
                    //Edit Button
                    $actionHtml = '<a href="'.$link.'/edit'.' " class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>';
                    //Delete Button
                    $actionHtml .='<a href="" data-delete-url="'.$link .'" class="btn btn-danger btn-sm delete-data" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-trash"></span></a>';

                    return $actionHtml;
                })
                ->rawColumns(['actions','status'])
                ->make(true);
        }
        return view('admin.posts.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        return view("admin.posts.create");
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'active' => 'required',
            'featured_image'=>'required'
        ]); 
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = Str::slug($inputs['title'], '-');


        if($inputs['featured_image'])
        {
            $image_path = uploadWithThumb($inputs['featured_image'],'images/blog');
            $inputs['featured_image'] = $image_path;   
        }


        PostsModel::create($inputs);
        session()->flash('success', 'Post Successfull!');

        return redirect("admin/posts");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        // $data = array();
        $post = PostsModel::findOrFail($id);

        //Tags should be populated in edit form
        $data['post'] = $post;
        return view("admin.posts.edit",$data);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request->validate( [
            'title' => 'required',
            'content' => 'required',
            'active' => 'required',
        ]);

        $data = $request->all();

        $posts = PostsModel::findOrFail($id);
        
        $data['slug'] = Str::slug($data['title'], '-');

        if($request->hasFile('featured_image'))
        {
            $image_path = uploadWithThumb($posts['featured_image'],'images/blog');
            $posts['featured_image'] = $image_path;   
        }

        // $this->postsRepository->update($inputs, $id);
        $posts->update($data);

        session()->flash('success','Posts updated successfully');
        
        return redirect(url('admin/posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $posts = PostsModel::findOrFail($id);
        $posts->delete($id);
        
        session()->flash('success','Posts deleted successfully');

        return redirect(url('admin/posts'));
    }
}