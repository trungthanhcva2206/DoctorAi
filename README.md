# DoctorAi
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.html)

ChatBot trả lời các câu hỏi của người dùng trong lĩnh vực y học.

# Changelogs
## V1.0.00
- Khởi tạo ChatBot DoctorAi.
- Chức năng quản lý user.
- Chức năng quản lý câu hỏi.
- Chức năng quản lý câu trả lời.
- Chức năng tạo tài khoản, đăng nhập, quên mật khẩu.

## V1.0.1
1 vài chức năng được thêm vào
- Chức năng cho phép người dùng chỉnh sửa thông tin tài khoản cá nhân.
- Chức năng cho phép người dùng đổi mật khẩu.

## V1.1.00
1 vài chức năng được thêm vào
- Chức năng cho phép người dùng hỏi các chuyên gia về lĩnh vực y học.
- Chức năng tự động gửi mail cho người dùng khi được hồi đáp của các chuyên gia.


Update lại 1 vài giao diện ở phần Admin.

## V1.1.1
- Chỉnh sửa lại 1 vài giao diện và chức năng.

# Setup

- Tải ChatBot tại: https://github.com/trungthanhcva2206/DoctorAi.git.
- Tạo 1 file tên .env và thêm đoạn này vào:
     ```
        APP_NAME=Laravel
        APP_ENV=local
        APP_KEY=base64:Wbvl0u3M3XSFKN+9zss6iY3VziF4aL89phG1KC0WzNg=
        APP_DEBUG=true
        APP_URL=http://localhost

        LOG_CHANNEL=stack
        LOG_DEPRECATIONS_CHANNEL=null
        LOG_LEVEL=debug

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=chatbox
        DB_USERNAME=root
        DB_PASSWORD=

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        FILESYSTEM_DISK=local
        QUEUE_CONNECTION=sync
        SESSION_DRIVER=file
        SESSION_LIFETIME=120

        MEMCACHED_HOST=127.0.0.1

        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379

        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=khongphaitankchoidau@gmail.com
        MAIL_PASSWORD=jnbudnefhvnauioz
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS="khongphaitankchoidau@gmail.com"
        MAIL_FROM_NAME="${APP_NAME}"

        AWS_ACCESS_KEY_ID=
        AWS_SECRET_ACCESS_KEY=
        AWS_DEFAULT_REGION=us-east-1
        AWS_BUCKET=
        AWS_USE_PATH_STYLE_ENDPOINT=false

        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        PUSHER_HOST=
        PUSHER_PORT=443
        PUSHER_SCHEME=https
        PUSHER_APP_CLUSTER=mt1

        VITE_APP_NAME="${APP_NAME}"
        VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
        VITE_PUSHER_HOST="${PUSHER_HOST}"
        VITE_PUSHER_PORT="${PUSHER_PORT}"
        VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
        VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ```
- Chạy lệnh php artisan serve.

# Tác giả
- Nguyễn Lê Trung Thành
- Nguyễn Lê Tuấn Anh
- Đinh Quốc Việt

# License
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.html)

