# TODO: Implement Admin Notifications for Guest Payments

## Steps to Complete

- [x] Create NotificationModel.php with notification handling methods
- [x] Update CreateNotificationsTable migration to define table schema
- [x] Modify Order.php confirmPayment to insert notification after order creation
- [x] Run migration to create notifications table
- [x] Test guest order flow to verify notification creation and visibility in admin panel
