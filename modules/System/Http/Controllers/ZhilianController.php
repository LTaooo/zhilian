<?php
declare(strict_types=1);

namespace Modules\System\Http\Controllers;

use Catch\Base\CatchController as Controller;
use Illuminate\Support\Facades\Auth;
use Modules\System\Models\Zhilian;
use Illuminate\Http\Request;
use Modules\User\Models\User;


class ZhilianController extends Controller
{
    public function __construct(
        protected readonly Zhilian $model
    ){}

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->model->getList();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->model->storeBy($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->firstBy($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update($id, Request $request)
    {
        return $this->model->updateBy($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->deleteBy($id);
    }

    public function get()
    {
        /** @var User $user */
        $user = Auth::guard(getGuardName())->user();
        /** @var Zhilian|null $model */
        $model = Zhilian::query()->where('username', $user->username)->orderBy('id')->first();
        return $model;
    }

    public function createOrUpdate(Request $request)
    {
        $params = $request->all();
        if (isset($params['id'])) {
            $this->model->updateBy($params['id'], $params);
        } else {
            $this->model->storeBy($params);
        }
        return $this->model->getKey();
    }
}
