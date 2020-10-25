<?php

namespace Netinternet\Ilkbyte\Api;

class Server extends Base
{
    public $server;

    /**
     * Server constructor.
     * @param $arguments
     */
    public function __construct($arguments)
    {
        if (isset($arguments[0])) {
            $this->server = $arguments[0];
        }
    }

    /**
     * Get all servers.
     *
     * @return array|mixed
     */
    public function all()
    {
        return $this->request('/server/list/all');
    }

    /**
     * Get only active servers.
     *
     * @return array|mixed
     */
    public function active()
    {
        return $this->request('/server/list');
    }

    /**
     * Create a new server.
     *
     * @param $query
     * @return array|mixed
     */
    public function create($query)
    {
        return $this->request('/server/create/config', $query);
    }

    /**
     * Get server configs you can choose.
     *
     * @return array|mixed
     */
    public function getConfig()
    {
        return $this->request('/server/create');
    }

    /**
     * Get server details.
     *
     * @return array|mixed
     */
    public function show()
    {
        return $this->request("/server/manage/$this->server/show");
    }

    /**
     * Get monitoring data.
     *
     * @return array|mixed
     */
    public function monitor()
    {
        return $this->request("/server/manage/$this->server/monitor");
    }

    /**
     * Server power settings.
     *
     * @param $set
     * @return array|mixed
     */
    public function power($set)
    {
        $query = [
            'set' => $set,
        ];

        return $this->request("/server/manage/$this->server/power", $query);
    }

    /**
     * Get all ips from server.
     *
     * @return array|mixed
     */
    public function ip()
    {
        return $this->request("/server/manage/$this->server/ip/list");
    }

    /**
     * Get ip logs.
     *
     * @return array|mixed
     */
    public function ipLogs()
    {
        return $this->request("/server/manage/$this->server/ip/logs");
    }

    /**
     * Add a new rdns record.
     *
     * @param $ip
     * @param $rdns
     * @return array|mixed
     */
    public function ipRdns($ip, $rdns)
    {
        $query = [
            'ip' => $ip,
            'rdns' => $rdns,
        ];

        return $this->request("/server/manage/$this->server/ip/rdns", $query);
    }
}
