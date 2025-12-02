# TODO List - Project Informatics

## Bug Fixes
- [x] Fix quantity issue in menu detail order now - Menu.php orderNow method now retrieves quantity from POST data instead of hardcoding to 1

## Pending Tasks
- [ ] Test the quantity fix by ordering from menu detail page
- [ ] Verify checkout displays correct quantity and total
- [ ] Test payment flow with correct quantities

## Notes
- The issue was in Menu.php orderNow method hardcoding qty=1
- Fixed by adding $qty = $this->request->getPost('quantity') ?? 1;
- Added validation to ensure qty >= 1
