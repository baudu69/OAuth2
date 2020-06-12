<?php


namespace App\DAO;


use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ServiceForum
{
    public function getLesSujets() {
        try {
            return DB::table('sujets')
                ->select('sujets.id', 'lib', 'sujets.created_at', 'sujets.userId', 'users.name')
                ->join('users', 'sujets.userId', '=', 'users.id')
                ->orderBy('created_at')
                ->get();
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function addSujet($libSujet, $userId) {
        try {
            DB::table('sujets')
                ->insert([
                    'lib' => $libSujet,
                    'created_at' => now(),
                    'userId' => $userId
                ]);
        } catch (QueryException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
