<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'idNotif';
    protected $allowedFields = ['idPesanan', 'tipeNotifikasi', 'status', 'ditujukanUntuk', 'waktuDibuat'];
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';

    /**
     * Get unread notifications ordered by creation date (newest first)
     */
    public function getUnreadNotifications()
    {
        return $this->where('status', 'pending')
                    ->orderBy('waktuDibuat', 'DESC')
                    ->findAll();
    }

    /**
     * Get count of unread notifications
     */
    public function getUnreadCount()
    {
        return $this->where('status', 'pending')->countAllResults();
    }

    /**
     * Mark a specific notification as read (change status to done)
     */
    public function markAsRead($id)
    {
        return $this->update($id, ['status' => 'done']);
    }

    /**
     * Get all notifications (for admin panel)
     */
    public function getAllNotifications()
    {
        return $this->orderBy('waktuDibuat', 'DESC')->findAll();
    }

    /**
     * Create a new notification
     */
    public function createNotification($idPesanan, $tipeNotifikasi = 'payment_confirmation')
    {
        return $this->insert([
            'idPesanan' => $idPesanan,
            'tipeNotifikasi' => $tipeNotifikasi,
            'status' => 'pending',
            'ditujukanUntuk' => 'admin',
            'waktuDibuat' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Get notifications for admin
     */
    public function getNotificationsForAdmin()
    {
        return $this->where('ditujukanUntuk', 'admin')
                    ->where('status', 'pending')
                    ->orderBy('waktuDibuat', 'DESC')
                    ->findAll();
    }

    /**
     * Generate human-readable message for notification
     */
    private function generateMessage($notification)
    {
        switch ($notification['tipeNotifikasi']) {
            case 'payment_confirmation':
                return "Pesanan #{$notification['idPesanan']} menunggu konfirmasi pembayaran tunai";
            default:
                return "Notifikasi baru untuk pesanan #{$notification['idPesanan']}";
        }
    }
}
