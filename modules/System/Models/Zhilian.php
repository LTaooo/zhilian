<?php

declare(strict_types=1);

namespace Modules\System\Models;

use Catch\Base\CatchModel as Model;

/**
 * @property $id
 * @property $username
 * @property $giteeusername
 * @property $giteerepo
 * @property $giteetoken
 * @property $githubusername
 * @property $githubrepo
 * @property $githubtoken
 * @property $title
 * @property $anurl
 * @property $tzurl
 * @property $creator_id
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
*/
class Zhilian extends Model
{
    

    protected $table = 'zhilian';

    protected $fillable = [ 'id', 'username', 'giteeusername', 'giteerepo', 'giteetoken', 'githubusername', 'githubrepo', 'githubtoken', 'title', 'anurl', 'tzurl', 'creator_id', 'created_at', 'updated_at', 'deleted_at' ];

    /**
     * @var array
     */
    protected array $fields = ['id','username','giteeusername','giteerepo','giteetoken','githubusername','githubrepo','githubtoken','title','anurl','tzurl','created_at','updated_at'];

    /**
     * @var array
     */
    protected array $form = ['username','giteeusername','giteerepo','giteetoken','githubusername','githubrepo','githubtoken','title','anurl','tzurl'];

    /**
     * @var array
     */
    public array $searchable = [
        'username' => '=',

    ];

    
}
