<?php namespace Idesigning\QTicketsAPI\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Model
{

    protected $attributes = [], $where = [], $orderBy = [], $relations = [];

    public function __construct(array $attributes = NULL)
    {
        $this->fill($attributes);
    }

    public function fill(array $attributes = NULL)
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function all()
    {
        return $this->get();
    }

    public function get()
    {
        $response = API::request([
            'method' => 'get',
            'model' => class_basename($this),
            'where' => $this->where,
            'orderBy' => $this->orderBy
        ]);

        $class = $this->getClass();

        $collect = new Collection();
        if (sizeof($response) > 0) {
            foreach ($response as $item) {
                $collect->add(new $class($item));
            }
        }

        return $collect;
    }

    private function getClass()
    {
        return '\\Idesigning\\QTicketsAPI\\Models\\' . class_basename($this);
    }

    public function findOrFail($id)
    {
        if ($result = $this->find($id)) {
            return $result;
        }

        throw new Exception(class_basename($this) . ' no records found');
    }

    public function find($id)
    {
        return $this->where('id', '=', $id)->get()->first();
    }

    public function where($column, $operator = null, $value = null)
    {
        $this->where[] = is_null($value) ? [$column, '=', $operator] : [$column, $operator, $value];

        return $this;
    }

    public function __call($name, $arguments)
    {
        if (preg_match('/where(.*?)/Uis', $name, $matches)) {
            return $this->where(snake_case($matches[1]), $arguments[0]);
        }

        if ($this->existsAttribute($name)) {
            return $this->getAttribute($name);
        }

        throw new Exception('Call to undefined method ' . $name);
    }

    public function existsAttribute($attribute)
    {
        return array_key_exists($attribute, $this->attributes);
    }

    public function getAttribute($attribute)
    {
        if (isset($this->relations[$attribute])) {
            $relatedClass = $this->relations[$attribute][0];

            return new $relatedClass($this->attributes[$attribute]);
        }

        return $this->attributes[$attribute];
    }

    public function __get($attribute)
    {
        return $this->getAttribute($attribute);
    }

    public function toArray()
    {
        return $this->attributes;
    }

    public function firstOrFail()
    {
        $result = $this->first();

        if ($result) {
            return $result;
        }

        throw new NotFoundHttpException('No records found');
    }

    public function first()
    {
        return $this->get()->first();
    }

    public function orderBy($column, $order)
    {
        $this->orderBy[] = [$column, $order];

        return $this;
    }
}