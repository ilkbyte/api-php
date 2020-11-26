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

    /**
     * Get all snapshots.
     *
     * @return array|mixed
     */
    public function snapshotList()
    {
        return $this->request("/server/manage/$this->server/snapshot");
    }

    /**
     * Create a new snapshot.
     *
     * @param string $snapshotName
     * @return array|mixed
     */
    public function snapshotCreate($snapshotName)
    {
        $query = [
            'name' => $snapshotName,
        ];

        return $this->request("/server/manage/$this->server/snapshot/create", $query);
    }

    /**
     * @param string $snapshotName
     * @return array|mixed
     */
    public function snapshotRevert($snapshotName)
    {
        $query = [
            'name' => $snapshotName,
        ];

        return $this->request("/server/manage/$this->server/snapshot/revert", $query);
    }

    /**
     * Recreate your snapshots.
     *
     * @param string $snapshotName
     * @return array|mixed
     */
    public function snapshotUpdate($snapshotName)
    {
        $query = [
            'name' => $snapshotName,
        ];

        return $this->request("/server/manage/$this->server/snapshot/update", $query);
    }

    /**
     * Delete snapshot.
     *
     * @param string $snapshotName
     * @return array|mixed
     */
    public function snapshotDelete($snapshotName)
    {
        $query = [
            'name' => $snapshotName,
        ];

        return $this->request("/server/manage/$this->server/snapshot/delete", $query);
    }

    /**
     * Add cron to your snapshot.
     *
     * @param array $query
     * @return array|mixed
     */
    public function snapshotAddCron($snapshotName, $day, $hour, $minute)
    {
        $query = [
            'name' => $snapshotName,
            'day' => $day,
            'hour' => $hour,
            'min' => $minute,
        ];

        return $this->request("/server/manage/$this->server/snapshot/cron/add", $query);
    }

    /**
     * Delete cron.
     *
     * @param string $query
     * @return array|mixed
     */
    public function snapshotDeleteCron($snapshotName)
    {
        $query = [
            'name' => $snapshotName,
        ];

        return $this->request("/server/manage/$this->server/snapshot/cron/delete", $query);
    }

    /**
     * Get backup list.
     *
     * @return array|mixed
     */
    public function backupList()
    {
        return $this->request("/server/manage/$this->server/backup");
    }

    /**
     * Restore your backup.
     *
     * @param string $backupName
     * @return array|mixed
     */
    public function backupRestore($backupName)
    {
        $query = [
            'backup_name' => $backupName,
        ];

        return $this->request("/server/manage/$this->server/backup/restore", $query);
    }
}
