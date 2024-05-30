<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrganizationService
{
    public static function index()
    {
        return DB::table('organizations')->select([
            "organizations.id as id",
            "organizations.name as name",
            "organizations.commission_rate as commission_rate",
            DB::raw("COUNT(DISTINCT NULLIF(organization_users.user_id,0)) as no_of_users"),
            DB::raw("COUNT(DISTINCT NULLIF(organization_users.category_id,0)) as no_of_categories"),
        ])
            ->leftJoin("organization_users", "organization_users.organization_id", "=", "organizations.id")
            ->groupBy(['organizations.id'])
            ->orderBy('organizations.id', 'desc')
            ->get();
    }

    public static function editUsersList($id)
    {
        return [
            "data" => DB::table('organization_users')->select([
                "users.id as id",
                "users.name as name",
            ])
                ->leftJoin("users", "users.id", "=", "organization_users.user_id")
                ->groupBy(['organization_users.user_id'])
                ->where(['organization_users.organization_id' => $id])
                ->get(),
            "users" => User::where(["status" => 1])->get()
        ];
    }

    public static function editCategoriesList($id)
    {
        return [
            "data" =>  DB::table('organization_users')->select([
                "categories.id as id",
                "categories.name as name",
            ])
                ->leftJoin("categories", "categories.id", "=", "organization_users.category_id")
                ->groupBy(['organization_users.category_id'])
                ->where(['organization_users.organization_id' => $id])
                ->get(),
            "categories" => Category::all()
        ];
    }

    public static function updateUsersList($id, $data)
    {
        if (isset($data["list"])) {
            $organization_id = $data["organization_id"];
            $users = array_values($data["list"]);
            $data = [];
            $orgnization_data = OrganizationUser::select(['category_id'])->where(['organization_id' => $id])->get()->toArray();
            if (count($orgnization_data) == 0) {
                for ($j = 0; $j < count($users); $j++) {
                    $data[] = [
                        "user_id" => $users[$j],
                        "organization_id" => $organization_id,
                    ];
                }
            } else {
                for ($i = 0; $i < count($orgnization_data); $i++) {
                    if(count($users) == 0){
                        for ($j = 0; $j < count($users); $j++) {
                            $data[] = [
                                "category_id" => $orgnization_data[$i]["category_id"],
                                "organization_id" => $organization_id,
                            ];
                        }
                    }
                    else{
                        for ($j = 0; $j < count($users); $j++) {
                            $data[] = [
                                "category_id" => $orgnization_data[$i]["category_id"],
                                "user_id" => $users[$j],
                                "organization_id" => $organization_id,
                            ];
                        }
                    }
                }
            }
            OrganizationUser::where(['organization_id' => $id])->delete();
            OrganizationUser::insert($data);
        } else {
            OrganizationUser::where(['organization_id' => $id])->delete();
        }
    }

    public static function updateCategoriesList($id, $data)
    {
        if (isset($data["list"])) {
            $organization_id = $data["organization_id"];
            $categories = array_values($data["list"]);
            $data = [];
            $orgnization_data = OrganizationUser::select(['user_id'])->where(['organization_id' => $id])->get()->toArray();
            if (count($orgnization_data) == 0) {
                for ($j = 0; $j < count($categories); $j++) {
                    $data[] = [
                        "category_id" => $categories[$j],
                        "organization_id" => $organization_id,
                    ];
                }
            } else {
                for ($i = 0; $i < count($orgnization_data); $i++) {
                    if(count($categories) == 0){
                        for ($j = 0; $j < count($categories); $j++) {
                            $data[] = [
                                "user_id" => $orgnization_data[$i]["user_id"],
                                "organization_id" => $organization_id,
                            ];
                        }
                    }
                    else{
                        for ($j = 0; $j < count($categories); $j++) {
                            $data[] = [
                                "user_id" => $orgnization_data[$i]["user_id"],
                                "category_id" => $categories[$j],
                                "organization_id" => $organization_id,
                            ];
                        }
                    }
                }
            }
            OrganizationUser::where(['organization_id' => $id])->delete();
            OrganizationUser::insert($data);
        } else {
            OrganizationUser::where(['organization_id' => $id])->delete();
        }
    }
}
