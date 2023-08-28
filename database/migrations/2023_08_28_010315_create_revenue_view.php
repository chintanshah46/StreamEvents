<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::Connection()->statement("CREATE OR REPLACE VIEW revenue_view as 
            SELECT * FROM 
            (
                (SELECT 'donations' AS 'type', ev.user_id, c.currecy_code AS 'cur', SUM(d.amount) AS 'amount'
                FROM donations d
                JOIN event_users ev ON d.event_user_id = ev.id AND ev.deleted_at IS NULL
                JOIN currencies c ON d.currency_id = c.id AND c.deleted_at IS NULL
                WHERE d.deleted_at IS NULL AND d.created_at BETWEEN ( NOW() - INTERVAL 30 DAY ) AND NOW()
                GROUP BY ev.user_id, d.currency_id)
                UNION
                (SELECT 'subscribers' AS 'type', ev.user_id, '' AS 'cur', ( COUNT(sb.subscription_id) * sp.price) AS 'amount'
                FROM subscribers sb
                JOIN event_users ev ON sb.event_user_id = ev.id AND ev.deleted_at IS NULL
                JOIN subscriptions sp ON sb.subscription_id = sp.id AND sp.is_active = 1 AND sp.deleted_at IS NULL
                WHERE sb.deleted_at IS NULL AND sb.created_at BETWEEN ( NOW() - INTERVAL 30 DAY ) AND NOW()
                GROUP BY ev.user_id, sb.subscription_id)
                UNION
                (SELECT 'sales' AS 'type', ev.user_id, c.currecy_code AS 'cur', SUM(ms.amount) AS 'amount'
                FROM merchandise_sales ms
                JOIN event_users ev ON ms.event_user_id = ev.id AND ev.deleted_at IS NULL
                JOIN currencies c ON ms.currency_id = c.id AND c.deleted_at IS NULL
                WHERE ms.deleted_at IS NULL AND ms.created_at BETWEEN ( NOW() - INTERVAL 30 DAY ) AND NOW()
                GROUP BY ev.user_id, ms.currency_id)
            ) t;
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::Connection()->statement('DROP VIEW IF EXISTS revenue_view;');
    }
};
