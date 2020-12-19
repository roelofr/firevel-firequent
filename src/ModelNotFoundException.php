<?php

namespace Firevel\Firequent;

use Illuminate\Support\Arr;
use RuntimeException;
use Throwable;

class ModelNotFoundException extends RuntimeException
{
    /**
     * Name of the affected Eloquent model.
     *
     * @var string
     */
    protected $model;

    /**
     * The affected model IDs.
     *
     * @var int|array
     */
    protected $ids;

    /**
     * @param null|string|object $model
     * @param array|scalar $ids
     * @param int $code
     * @param null|Throwable $previous
     */
    public function __construct(
        $model = null,
        $ids = [],
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $this->model = is_object($model) ? get_class($model) : $model;
        $this->ids = Arr::wrap($ids);

        $message = "No query results for model";
        if ($this->model) {
            $message .= " [{$this->model}]";
        }

        if ($this->ids) {
            $message .= sprintf(' with ids [%s]', implode(', ', $this->ids));
        }

        parent::__construct("{$message}.", $code, $previous);
    }

    /**
     * Get the affected Eloquent model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get the affected Eloquent model IDs.
     *
     * @return int|array
     */
    public function getIds()
    {
        return $this->ids;
    }
}
