<?php
/* Plugin Name: Increase Upload Limit */
add_filter( 'upload_size_limit', 'b5f_increase_upload' );
function b5f_increase_upload($bytes) {
	return 33554432; // 32 megabytes
}