# TODO: Fix Cart Icon and Badge

## Tasks
- [x] Fix CSS positioning in layout_modern.php to prevent clipping
- [x] Update cart count selector in menu.php for proper updates
- [x] Make cart icon smaller and ensure it's not cut off
- [x] Test badge visibility with large numbers
- [ ] Test badge visibility with large numbers

## Details
- Badge class: .cart-count-ultra
- Icon class: .cart-icon-ultra
- Current positioning: top: -10px; right: -10px; (fixed)
- Parent container needs overflow: visible (added)
- Update function targets wrong selector (#cart-count vs .cart-count-ultra) (fixed)
- Icon size: reduced from 1.8rem to 1.5rem
