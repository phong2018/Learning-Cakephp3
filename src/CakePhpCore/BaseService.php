<?php

namespace App\CakePhpCore;

use Cake\ORM\Locator\LocatorAwareTrait;

abstract class BaseService
{
    use LocatorAwareTrait;
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var Model|int
     */
    protected $model;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var Model
     */
    protected $handler;

    protected $header;

    protected $request;

    protected $flash;

    /**
     * Set the repository
     *
     * @param mixed $data
     * @return self
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * Set the data
     *
     * @param mixed $data
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Set the handler
     *
     * @param \Illuminate\Database\Eloquent\Model $handler
     * @return self
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;

        return $this;
    }

    public function setHeader($request)
    {
        $this->header = $request->getHeaders();

        return $this;
    }

    /**
     * Set the handler
     *
     * @param \Illuminate\Database\Eloquent\Model|int $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Set the request to service
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return self
     */
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Set the flash to service
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return self
     */
    public function setFlash($flash)
    {
        $this->flash = $flash;

        return $this;
    }

    abstract public function handle();
}
