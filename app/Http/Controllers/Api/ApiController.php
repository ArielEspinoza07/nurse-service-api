<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Services\Response;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Services\ExceptionResponse;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class ApiController extends Controller
{
    /**
     * @param string $message
     * @param null   $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function success(string $message, $data = null, int $code = 200): JsonResponse
    {
        return response()->json(Response::success($message, $data), $code);
    }


    /**
     * @param string $message
     * @param        $data
     * @param int    $code
     *
     * @return JsonResponse
     */
    protected function error(string $message, $data = null, int $code = 500): JsonResponse
    {
        return response()->json(Response::error($message, $data), $code);
    }


    /**
     * @param RepositoryInterface $repository
     *
     * @return JsonResponse
     */
    protected function defaultIndex(RepositoryInterface $repository): JsonResponse
    {
        $repository->pushCriteria(app('App\Criteria\DeletedCriteria'));
        $repository->pushCriteria(app('\Prettus\Repository\Criteria\RequestCriteria'));
        if (request()->has('all')) {

            return $this->success($this->modelName($repository, true).' retrieved.', $repository->all());
        }

        return $this->success($this->modelName($repository, true).' retrieved.', $repository->paginate(request()->get('page_size')));
    }


    /**
     * @param RepositoryInterface $repository
     * @param FormRequest         $request
     * @param ValidatorInterface  $validator
     *
     * @return JsonResponse
     */
    protected function defaultStore(RepositoryInterface $repository, ValidatorInterface $validator, FormRequest $request): JsonResponse
    {
        try {
            $validator->with($request->all())
                      ->passesOrFail(ValidatorInterface::RULE_CREATE);
            $model = $repository->create($request->all());

            return $this->success($this->modelName($repository).' created.', $model, 201);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }


    /**
     * @param RepositoryInterface $repository
     * @param int                 $id
     *
     * @return JsonResponse
     */
    protected function defaultShow(RepositoryInterface $repository, int $id): JsonResponse
    {
        try {
            $model = $repository->find($id);

            return $this->success($this->modelName($repository).' retrieved.', $model);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }


    /**
     * @param RepositoryInterface $repository
     * @param int                 $id
     * @param FormRequest         $request
     * @param ValidatorInterface  $validator
     *
     * @return JsonResponse
     */
    protected function defaultUpdate(RepositoryInterface $repository, ValidatorInterface $validator, FormRequest $request, int $id): JsonResponse
    {
        try {
            $validator->with($request->all())
                      ->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $model = $repository->update($request->all(), $id);

            return $this->success($this->modelName($repository).' updated.', $model);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }


    /**
     * @param RepositoryInterface $repository
     * @param int                 $id
     *
     * @return JsonResponse
     */
    protected function defaultDelete(RepositoryInterface $repository, int $id): JsonResponse
    {
        try {
            $model = $repository->delete($id);

            return $this->success($this->modelName($repository).' deleted.', $model);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }


    /**
     * @param RepositoryInterface $repository
     * @param int                 $id
     *
     * @return JsonResponse
     */
    public function defaultRestore(RepositoryInterface $repository, int $id): JsonResponse
    {
        try {
            $repository->skipPresenter(true);
            $model = $repository->find($id);
            $model->restore();
            $repository->skipPresenter(false);

            return $this->success($this->modelName($repository).' restored.', $model);
        } catch (Exception $exception) {

            return $this->exceptionMessage($exception);
        }
    }


    /**
     * @param RepositoryInterface $repository
     * @param bool                $plural
     *
     * @return string
     */
    protected function modelName(RepositoryInterface $repository, bool $plural = false): string
    {
        $name = strtr(class_basename($repository), ['RepositoryEloquent' => '']);
        if ($plural) {
            return Str::plural($name);
        }

        return $name;
    }


    /**
     * @param Exception $exception
     *
     *
     * @return JsonResponse
     */
    protected function exceptionMessage(Exception $exception): JsonResponse
    {
        Log::warning(__CLASS__.' | '.__FUNCTION__.' | ', [
            'code'    => $exception->getCode(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
            'message' => $exception->getMessage(),
        ]);

        return (new ExceptionResponse($exception))->handle();
    }
}
