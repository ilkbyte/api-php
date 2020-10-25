<?php

namespace Netinternet\Ilkbyte\Api;

class Domain extends Base
{
    public $domain;

    /**
     * Domain constructor.
     * @param $arguments
     */
    public function __construct($arguments)
    {
        if (isset($arguments[0])) {
            $this->domain = $arguments[0];
        }
    }

    /**
     * Get all domains.
     *
     * @return array|mixed
     */
    public function all()
    {
        return $this->request('/domain/list');
    }

    /**
     * Create a new domain.
     *
     * @param $domain
     * @return array|mixed
     */
    public function create($domain)
    {
        $query = [
            'domain' => $domain,
        ];

        return $this->request('/domain/create', $query);
    }

    /**
     * Get domain details.
     *
     * @return array|mixed
     */
    public function show()
    {
        return $this->request("/domain/manage/$this->domain/show");
    }

    /**
     * Add a new record.
     *
     * @param $query
     * @return array|mixed
     */
    public function add($query)
    {
        return $this->request("/domain/manage/$this->domain/add", $query);
    }

    /**
     * Update an existing record.
     *
     * @param $query
     * @return array|mixed
     */
    public function update($query)
    {
        return $this->request("/domain/manage/$this->domain/update", $query);
    }

    /**
     * Delete domain.
     *
     * @return array|mixed
     */
    public function delete()
    {
        return $this->request("/domain/manage/$this->domain/delete");
    }

    /**
     * @return array|mixed
     */
    public function push()
    {
        return $this->request("/domain/manage/$this->domain/push");
    }
}
