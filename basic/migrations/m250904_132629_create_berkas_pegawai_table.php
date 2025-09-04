<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%berkas_pegawai}}`.
 */
class m250904_132629_create_berkas_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%berkas_pegawai}}', [
            'id_berkas_pegawai' => $this->primaryKey(),
            'id_staff' => $this->bigInteger()->notNull()->unsigned(),
            'jenis_identiti' => $this->string(50)->notNull(),
            'no_identiti' => $this->string(50)->notNull(),
            'tarikh_akhir_valid' => $this->date(),
        ]);

        // add foreign key
        $this->addForeignKey(
            //name of the foreign key
            'fk-berkas_pegawai_id_staff',
            //nama table yg pertama
            'berkas_pegawai',
            //field yg akan di hubungkan
            'id_staff',
            //nama table kedua
            'staff',
            //field yg akan di hubungkan
            'id_staff',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%berkas_pegawai}}');
    }
    //macam laravel punya migration lebih kurang
}