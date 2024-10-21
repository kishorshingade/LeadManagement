<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $employee = Role::create(['name' => 'Employee']);
        $HR = Role::create(['name' => 'HR']);

        $view_dashboard = Permission::create(['name' => 'view_dashboard']);

        $settings_crud = Permission::create(['name' => 'settings_crud']);

        $view_users_list = Permission::create(['name' => 'view_users_list']);
        $category_crud = Permission::create(['name' => 'category_crud']);
        $product_crud = Permission::create(['name' => 'product_crud']);
        $order_status = Permission::create(['name' => 'order_status']);

        $view_orders_list = Permission::create(['name' => 'view_orders_list']);

        $view_comments_list = Permission::create(['name' => 'view_comments_list']);
        $view_reviews_list = Permission::create(['name' => 'view_reviews_list']);

        $admin_permissions = [
            $view_dashboard,
            $view_orders_list,
            $settings_crud,
            $view_users_list,
            $category_crud,
            $product_crud,
            $order_status,
            $view_comments_list,
            $view_reviews_list,
        ];

        $HR_permissions = [
            $view_dashboard,
            $category_crud,
            $product_crud,
            $view_orders_list,
            $order_status,
            $settings_crud,
            $view_users_list,
            $view_comments_list,
            $view_reviews_list,
        ];

        $employee_permissions = [
            $view_dashboard,
            $view_orders_list,
            $view_comments_list,
            $view_reviews_list,
        ];


        $admin->syncPermissions($admin_permissions);
        $HR->syncPermissions($HR_permissions);
        $employee->syncPermissions($employee_permissions);
    }
}
