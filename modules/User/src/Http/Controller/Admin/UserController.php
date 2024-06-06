<?php
namespace Modules\User\Src\Http\Controller\Admin;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Modules\User\Src\Http\Requests\UserRequest;
use Modules\User\Src\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;

    }
    public function index()
    {
        $pageTitle = "Users management";
        $pageHeading = "Users management";
        return view('user::admin.index', compact('pageTitle', 'pageHeading'));
    }
    public function data()
    {
        $users = $this->userRepository->getAllUser();
        return DataTables::of($users)
            ->addColumn('edit', function ($product) {
                return '<a href="' . route('admin.users.edit', $product) . '" class="btn btn-warning">Edit</a>';
            })
            ->addColumn('delete', function ($product) {
                return '<a href="' . route('admin.users.delete', $product) . '" class="btn btn-danger delete-action">Delete</a>';
            })
            ->editColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at);
            })
            // ->editColumn('status', function ($product) {
            //     return $product->status == 1 ? '<button class="btn btn-success">Ra Mắt</button>' : '<button class="btn btn-danger">Chưa Ra Mắt</button>';
            // })
            ->rawColumns(['created_at','edit','delete'])
            ->toJson();
    }
    public function create(){
        $pageTitle = "Create User";
        $pageHeading = "Create User";
        return view("user::admin.create",compact("pageTitle", "pageHeading"));
    }
    public function store(UserRequest $request){
        $user = $request->except(['_token']);
        if (!empty($user['password'])) {
            $user['password'] = bcrypt($user['password']);
        }
        $this->userRepository->create($user);
        return redirect()->route('admin.users.index')->with('user::messages.create.success');

    }
    public function edit($id){
        $user = $this->userRepository->find($id);
        if(!$user) {
            abort(404);
        }
        $pageTitle = "Edit User";
        $pageHeading = "Edit User";
        return view("user::admin.edit",compact("user", "pageTitle", "pageHeading"));
    }
    public function update($id, UserRequest $request){
        // dd($request);
        $user = $this->userRepository->find($id);
        if(!$user) {
            abort(404);
        }
        $user = $request->except(['_token']);
        if (!empty($user['password'])) {
            $user['password'] =  bcrypt($user['password']);
        }else {
            unset($user['password']);
        }
        $this->userRepository->update( $id,$user);
        return back()->with('msg', __('user::messages.update.success', ['email' => $user['email'], 'time' => date('Y-m-d H:i:s')]));

    }
    public function delete($id){
        $user = $this->userRepository->find($id);
        if(!$user) {
            abort(404);
        }
        $this->userRepository->delete($user->id);
        return back()->with('msg', __('user::messages.delete.success', ['email' => $user->email, 'time' => date('Y-m-d H:i:s')]));
    }
}