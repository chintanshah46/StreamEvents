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
        DB::Connection()->statement("CREATE OR REPLACE VIEW summary_view as 
            SELECT * FROM 
            ( 
                (SELECT f.id AS 'id', ev.name AS 'user', ev.id AS 'ev_id', ev.user_id, f.has_read AS 'read', f.created_at AS 'created', 'followers' AS 'type', '' AS 'subscription', '' AS 'amount', '' AS 'message', '' AS 'cur', '' AS 'product_name'
                FROM followers f
                JOIN event_users ev ON f.event_user_id=ev.id
                WHERE ev.deleted_at IS NULL AND f.deleted_at IS NULL)
                UNION
                (SELECT sb.id AS 'id', ev.name AS 'user', ev.id AS 'ev_id', ev.user_id, sb.has_read AS 'read', sb.created_at AS 'created', 'subscribers' AS 'type', sp.name AS 'subscription', '' AS 'amount', '' AS 'message', '' AS 'cur', '' AS 'product_name'
                FROM subscribers sb
                JOIN event_users ev ON sb.event_user_id=ev.id
                JOIN subscriptions sp ON sb.subscription_id =sp.id AND sp.is_active=1
                WHERE ev.deleted_at IS NULL AND sb.deleted_at IS NULL AND sp.deleted_at IS NULL)
                UNION
                (SELECT d.id AS 'id', ev.name AS 'user', ev.id AS 'ev_id', ev.user_id, d.has_read AS 'read', d.created_at AS 'created', 'donations' AS 'type', '' AS 'subscription', d.amount AS 'amount', d.donation_message AS 'message', c.currecy_code AS 'cur', '' AS 'product_name'
                FROM donations d
                JOIN event_users ev ON d.event_user_id=ev.id AND ev.deleted_at IS NULL
                JOIN currencies c ON d.currency_id=c.id AND c.deleted_at IS NULL
                WHERE d.deleted_at IS NULL)
                UNION
                (SELECT ms.id AS 'id', ev.name AS 'user', ev.id AS 'ev_id', ev.user_id, ms.has_read AS 'read', ms.created_at AS 'created', 'sales' AS 'type', '' AS 'subscription', ms.amount AS 'amount', '' AS 'message', c.currecy_code AS 'cur', m.name AS 'product_name'
                FROM merchandise_sales ms
                JOIN event_users ev ON ms.event_user_id=ev.id AND ev.deleted_at IS NULL
                JOIN currencies c ON ms.currency_id=c.id AND c.deleted_at IS NULL
                JOIN merchandises m ON ms.merchandise_id=m.id AND m.is_active=1 AND m.deleted_at IS NULL)
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
        DB::Connection()->statement('DROP VIEW IF EXISTS summary_view;');
    }
};
