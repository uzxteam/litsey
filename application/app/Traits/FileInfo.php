<?php

namespace App\Traits;

trait FileInfo
{

    /*
    |--------------------------------------------------------------------------
    | File Information
    |--------------------------------------------------------------------------
    |
    | This trait basically contain the path of files and size of images.
    | All information are stored as an array. Developer will be able to access
    | this info as method and property using FileManager class.
    |
    */

    public function fileInfo(){

        $data['depositVerify'] = [
            'path'      =>'assets/images/verify/deposit'
        ];
        $data['verify'] = [
            'path'      =>'assets/verify'
        ];
        $data['default'] = [
            'path'      => 'assets/images/general/default.png',
        ];

        $data['ticket'] = [
            'path'      => 'assets/support',
        ];
        $data['logoIcon'] = [
            'path'      => 'assets/images/general',
        ];
        $data['favicon'] = [
            'size'      => '128x128',
        ];
        $data['extensions'] = [
            'path'      => 'assets/images/plugins',
            'size'      => '36x36',
        ];
        $data['seo'] = [
            'path'      => 'assets/images/seo',
            'size'      => '1180x600',
        ];
        $data['userProfile'] = [
            'path'      =>'assets/images/user/profile',
            'size'      =>'350x300',
        ];
        $data['adminProfile'] = [
            'path'      =>'assets/admin/images/profile',
            'size'      =>'400x400',
        ];

        $data['banner'] = [
            'path'      =>'assets/images/frontend/banner',
        ];
        $data['ThemeThreeBanner'] = [
            'path'      =>'assets/images/frontend/theme_three_banner',
        ];
        $data['about'] = [
            'path'      =>'assets/images/frontend/about',
        ];
        $data['ThemeTwoAbout'] = [
            'path'      =>'assets/images/frontend/theme_two_about',
        ];
        $data['ThemeThreeAbout'] = [
            'path'      =>'assets/images/frontend/theme_three_about',
        ];
        $data['chooseus'] = [
            'path'      =>'assets/images/frontend/choose_us',
        ];
        $data['ThemeTwoChooseus'] = [
            'path'      =>'assets/images/frontend/theme_two_choose_us',
        ];
        $data['ThemeThreeChooseus'] = [
            'path'      =>'assets/images/frontend/theme_three_choose_us',
        ];
        $data['portfolio'] = [
            'path'      =>'assets/images/frontend/portfolio',
        ];

        $data['ThemeTwoPortfolio'] = [
            'path'      =>'assets/images/frontend/theme_two_portfolio',
        ];
        $data['ThemeThreePortfolio'] = [
            'path'      =>'assets/images/frontend/theme_three_portfolio',
        ];
        $data['teamMember'] = [
            'path'      =>'assets/images/frontend/team_member',
        ];
        $data['testimonial'] = [
            'path'      =>'assets/images/frontend/testimonial',
        ];
        $data['subscribe'] = [
            'path'      =>'assets/images/frontend/subscribe',
        ];
        $data['faq'] = [
            'path'      =>'assets/images/frontend/faq',
        ];
        $data['blog'] = [
            'path'      =>'assets/images/frontend/blog',
        ];
        $data['brand'] = [
            'path'      =>'assets/images/frontend/brand',
        ];
        $data['contact_us'] = [
            'path'      =>'assets/images/frontend/contact_us',
        ];

        $data['portfolioImage'] = [
            'path'      =>'assets/images/frontend/portfolioImage',
            'size'     =>'416x417',
        ];
        $data['serviceFile'] = [
            'path'      =>'assets/images/frontend/serviceFile',
        ];
        return $data;
	}

}
