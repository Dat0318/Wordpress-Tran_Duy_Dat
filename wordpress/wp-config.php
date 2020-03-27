<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ZU~=r:Bo2mVrK6DSqD+NIKt;(f=bc@:V4U-EMGW~>{3JY8Go@@*DYR,q^P|n=hg-' );
define( 'SECURE_AUTH_KEY',  'BzC%Wz7f4V[^@6y$C|/%B,35(~XXZG._&7ksG*XshV)jWRJ=3zAF=!ZhPh@J3^d!' );
define( 'LOGGED_IN_KEY',    '[peyZe[khwl-MyW-lbyTrYQZYW>U?hS[KH?kr)|@vIyXzv?u!zurjP_J@sC^&-e_' );
define( 'NONCE_KEY',        '8r$`&HH p}5zqsRzB]Mmi9i~UQ.t>Z,d`{F=a#_oVP|]bmpSVU(G=Gq$F_w=Tp*z' );
define( 'AUTH_SALT',        'dV[zt8X;w6es&J6UeB!xuw,5_Nstjveuaj&uV_W*/F<NGfdKDlLPEH KKTD+b-U0' );
define( 'SECURE_AUTH_SALT', 'z[vtk5w*Lidx}_h#8.wc!cqX_TQ+/zU%d$N-k%6fY.0GO>&Bx0j),b<PJHheA& N' );
define( 'LOGGED_IN_SALT',   '$Y/7{?a:5}vN]Rj_07dwrL37bJ{@a}~Ed5X>)?4!Y{Tp_][rMnmlH>h<DA~nN7*w' );
define( 'NONCE_SALT',       'BqQiWfwRXzk(}F>(]=F~{w_ija1Oojz#,-4o^buR-u^!AF6 Edu7 Fnu.&`MIx:[' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
