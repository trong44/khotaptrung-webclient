<?php


return [
    'user'=>[
        'encrypt' => env('ENCRYPT_USER')
    ],
    'charge' => [
        'key'=>"charge",
        'title'=>"Nạp thẻ tự động",
        'status' => [
            '1' => 'Thẻ đúng',
            '0' => 'Thẻ sai',
            '2' => 'Chờ xử lý',
            '3' => 'Sai mệnh giá',
            '999' => 'Lỗi nạp thẻ',
            '-999' => 'Lỗi nạp thẻ',
            '-1' => 'Phát sinh lỗi nạp thẻ',
        ],
        'key_encrypt' => env('ENCRYPT_CHARGING'),
    ],
    'transfer' => [
        'key'=>"charge",
        'title'=>"Nạp ATM tự động",
        'status' => [
            '1' => 'Thành công(Đúng số tiền)',
            '0' => 'Thất bại',
            '2' => 'Chờ xử lý',
            '3' => 'Thành công(Sai số tiền)',
        ],
    ],
    'acc' => [
        'key'=>"charge",
        'encrypt_key' => '2314ku',
        'slug-auto' => 'nick-lien-minh',
        'status' => [
//            1 => 'Chưa bán',
            0 => 'Thành công',
            2 => 'Chờ xử lý',
            3 => 'Đang check thông tin',
            4 => 'Sai thông tin',
            5 => 'Đã xoá',
            6 => 'Check lỗi'],
        'price' => [
            '0-50000' => 'Dưới 50K',
            '50000-200000' => 'Từ 50K - 200K',
            '200000-500000' => 'Từ 200K - 500K',
            '500000-1000000' => 'Từ 500K - 1 Triệu',
            '1000000-5000000' => 'Trên 1 Triệu',
            '5000000-10000000' => 'Trên 5 Triệu',
            '10000000' => 'Trên 10 Triệu',
        ],
        'auto_ninja_tt' => [
            'Cấp độ',
            'Lớp',
            'Sách kỹ năng sơ',
            'Sách tiềm năng sơ',
            'Bánh phong lôi',
            'Bánh đăng hỏa',
            'Lượng',
            'Yên',
        ],
        'auto_ninja_list_tt' => [
            'Cấp độ',
            'Lớp',
            'Yên',
        ],
        'auto_nro_tt' => [
            'giáp',
            'HP hiện tại',
            'ngọc',
            'tên nhân vật',
            'tiềm năng',
            'sức đánh',
            'vàng',
            'sức mạnh',
            'cấp độ',
            'HP max',
            'KI hiện tại',
            'tên nhân vật',
            'ngọc khóa',
            'tỉ lệ chí mạng',
            'KI max',
            'Skill Pet',
            'Cải trang',
            'Hành tinh',
            'Bông tai'
        ],
        'auto_nro_list_tt' => [
//            'giáp',
//            'HP hiện tại',
//            'ngọc',
//            'tên nhân vật',
//            'tiềm năng',
//            'sức đánh',
//            'vàng',
//            'sức mạnh',
//            'cấp độ',
//            'HP max',
//            'KI hiện tại',
//            'tên nhân vật',
//            'ngọc khóa',
//            'tỉ lệ chí mạng',
//            'KI max',
            'Skill Pet',
            'Cải trang',
            'Hành tinh',
            'Bông tai'
        ],
        'auto_lm_rank' => [
            'IRON' => 'Sắt',
            'BRONZE' => 'Đồng',
            'SILVER' => 'Bạc',
            'GOLD' => 'Vàng',
            'PLATINUM' => 'Bạch kim',
            'DIAMOND' => 'Kim cương',
            'GRANDMASTER' => 'Đại cao thủ',
            'MASTER' => 'Cao thủ',
            'CHALLENGER' => 'Thách đấu',
        ],
        'auto_nro_skill_pet_2' => [
            'Chiêu Masenko' => 'Chiêu Masenko',
            'Chiêu Kamejoko' => 'Chiêu Kamejoko',
            'Chiêu Antomic' => 'Chiêu Antomic',
        ],
        'auto_nro_skill_pet_3' => [
            'Thái Dương Hạ San' => 'Thái Dương Hạ San',
            'Tái tạo năng lượng' => 'Tái tạo năng lượng',
            'Kaioken' => 'Kaioken',
        ],
        'auto_nro_skill_pet_4' => [
            'Đẻ trứng' => 'Đẻ trứng',
            'Biến hình' => 'Biến hình',
            'Khiên năng lượng' => 'Khiên năng lượng',
        ],
        'viewed'=>[
            'limit_count'=>20,
        ],
    ],
    'txns' => [
        'trade_type' => [
            '1' => 'Nạp thẻ tự động',
            '2' => 'Nạp thẻ chậm',
            '3' => 'Chuyển tiền',
            '4' => 'Nhận tiền',
            '5' => 'Rút tiền',
            '6' => 'Cộng tiền',
            '7' => 'Trừ tiền',
            '8' => 'Tiền thưởng',
            '9' => 'Thanh toán bán nick',
            '10' => 'Đặt cọc (Trả góp)',
            '11' => 'Hoàn tiền',
            '12' => 'Thanh toán dịch vụ',
            '13' => 'Hoàn tất dịch vụ',
            '14' => 'Thanh toán mua thẻ',
            '15' => 'Thanh toán mua phụ kiện',
            '101' => 'Tăng số dư',
            '102' => 'Giảm số dư',
            '103' => 'Chuyển nhận tiền',
            '104' => 'Cộng trừ tiền',
            '105' => 'Mua tài khoản game',
            '106' => 'Mua kim cương',
            '107' => 'Vòng quay may mắn',
            '108' => 'Vòng quay vật phẩm',
            '109' => 'Lật hình vật phẩm',
            '110' => 'Lật hình trúng nick',
            '111' => 'Quay hình trúng vp',
            '112' => 'Quay hình trúng nick',
            '113' => 'Quay hình trúng tiền',
            '114' => 'Vòng quay trúng tiền',
            '115' => 'Lật hình trúng tiền',
            '116' => 'Quay xèng trúng vp',
            '117' => 'Quay xèng trúng nick',
            '118' => 'Quay xèng trúng tiền',
            '119' => 'Vòng quay trúng nick',
        ],
        'trade_type_api' => [
            'charge' => 'Nạp thẻ tự động',
            'service_purchase' => 'Thanh toán dịch vụ',
            'transfer' => 'Nạp Ví - ATM tự động',
            'rubywheel' => 'Mingame vòng quay',
            'flip' => 'Mingame lật hình',
            'plus_money' => 'Cộng tiền',
            'minus_money' => 'Trừ tiền',
            'slotmachine' => 'Mingame quay xèng',
            'slotmachine5' => 'Mingame quay xèng 5 giải',
            'squarewheel' => 'Mingame quay vòng vòng',
            'smashwheel' => 'Mingame đập lu đồng',
            'rungcay' => 'Mingame rung cây',
            'gieoque' => 'Mingame gieo quẻ',
            'buy_acc' => 'Mua tài khoản',
        ],
        'status' => [
            '0' => 'Không thành công',
            '1' => 'Thành công',
            '2' => 'Chờ xử lý',
        ],
    ],
    'service' => [
        'title' => 'Dịch vụ',
        'key_app' => 'service',
        'key_cat' => 'service_category',
        'key_group' => 'service_group',
        'key_purchase' => 'service_purchase',
        'key_workflow' => 'service_workflow',
        'key_workname' => 'service_workname',
        'key_provider' => 'service_provider',
        'key_attribute' => 'service_attribute',
        'key_attribute_value' => 'service_attribute_value',
        'key_single' => 'service_single',

        'status' => [
            '1' => 'Hoạt động',
            '0' => 'Ngừng hoạt động'
        ],
        'purchase_status' => [
            '0' => 'Đã hủy',
            '1' => 'Đang chờ',
            '2' => 'Đang thực hiện',
            '3' => 'Từ chối',
            '4' => 'Hoàn tất',
            '5' => 'Thất bại'

        ],
        'mistake_by' => [
            '1' => 'Khách',
            '0' => 'QTV',
            '2' => 'Game',
        ],


    ],
    'store-card' => [
        'key'=>"store-card",
        'title'=>"Thống kê mua thẻ",
        'status' => [
            '0' => 'Thất bại',
            '1' => 'Thành công',
            '2' => 'Đang chờ',
            '3' => 'Đã hủy', // trường hợp này sau sẽ dùng cho thanh toán cổng thẻ
            '4' => 'Đang chờ',
            '5' => 'Đang chờ'
        ],
    ],
    'minigame' => [
        'game_type' => [
            '1' => 'Liên quân mobile (Quân huy)',
            '2' => 'Freefire (kim cương)',
            '3' => 'Liên minh',
            '4' => 'Blade an Soul',
            '5' => 'Âm dương sư',
            '6' => 'Fifa online 4',
            '7' => 'Fifa online 4 mobile',
            '8' => 'Pubg mobile',
            '9' => 'Audition mobile',
            '10' => 'BlockMango',
            '11' => 'Ninjaxu school',
            '12' => 'Ngọc rồng (Ngọc)',
            '13' => 'Roblox',
            '14' => 'Ngọc rồng (Vàng)',
        ],
        'game_type_map' => [
            '1' => 'lienquan',
            '2' => 'freefire',
            '3' => 'lienminh',
            '4' => 'bns',
            '5' => 'ads',
            '6' => 'fo4',
            '7' => 'fo4m',
            '8' => 'pubgm',
            '9' => 'aumobile',
            '10' => 'blockmango',
            '11' => 'ninjaxu',
            '12' => 'nrogem',
            '13' => 'roblox_buyserver',
            '14' => 'nrocoin',
        ],
        'game_type_value' => [
            '1' => 'QUÂN HUY',
            '2' => 'KC',
            '3' => 'RP',
            '4' => 'VÀNG',
            '5' => 'ads',
            '6' => 'fo4',
            '7' => 'fo4m',
            '8' => 'UC',
            '9' => 'aumobile',
            '10' => 'GCUBE',
            '11' => 'XU',
            '12' => 'HỒNG NGỌC',
            '13' => 'ROBUX',
            '14' => 'VÀNG',
        ],
    ],
];
