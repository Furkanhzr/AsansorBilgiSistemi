<?php

namespace App\Helpers\Permission;

class Permission {
    protected $permissions = [
        'urunler' => 'Ürünler',
        'asansorler' => 'Asansörler',
        'arizalar' => 'Arızalar',
        'bakimlar' => 'Bakımlar',
        'kullanici' => 'Kullanıcılar',
        'iletisim' => 'İletişimler',
        'admin' => 'Admin İşlemleri',
        'roller' => 'Rol Ayarları',
    ];

    public function get_permissions() {
        return $this->permissions;
    }


}
