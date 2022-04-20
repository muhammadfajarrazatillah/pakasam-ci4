<?php

namespace App\Models;

use CodeIgniter\Model;

class RakModel extends Model
{
	protected $table			     = 'rak';
	protected $primaryKey       = 'id_rak';
	protected $returnType        = 'object';
	protected $allowedFields	= ['rak'];

	protected $validationRules    = [
        'rak'     => 'required',
    ];

    protected $validationMessages = [
		'rak'        => [
            'required' => 'Rak tidak boleh kosong.',
        ],
    ];
}
