<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;

class BuilderModel
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function get()
    {
        //SELECT * FROM video_games_sales LIMIT 20 OFFSET 0
        $builder = $this->db->table('video_games_sales');
        $query = $builder->get(20, 0);
        return $query;
    }

    public function get_compiled_select()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->where('Publisher', 'Nintendo');
        $query = $builder->getCompiledSelect();
        return $query;
    }

    public function get_where()
    {
        //SELECT * FROM `video_games_sales` WHERE `Publisher` = 'Nintendo'
        $builder = $this->db->table('video_games_sales');
        $query = $builder->getWhere(['Publisher' => 'Nintendo']);
        return $query;
    }

    public function select()
    {
        // SELECT Name, Platform FROM video_games_sales LIMIT 1 OFFSET 0
        $builder = $this->db->table('video_games_sales');
        $builder->select('Name, Platform');
        $query = $builder->get(1, 0);
        return $query;
    }

    public function select_max()
    {
        // SELECT MAX(Global_Sales) AS Total_Penjualan FROM video_games_sales
        $builder = $this->db->table('video_games_sales');
        $builder->selectMax('Global_Sales', 'Total_Penjualan');
        $query = $builder->get();
        return $query;
    }

    public function select_min()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->selectMin('Global_Sales');
        $query = $builder->get();
        return $query;
    }

    public function select_avg()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->selectAvg('Global_Sales');
        $query = $builder->get();
        return $query;
    }

    public function select_sum()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->selectSum('User_Count');
        $query = $builder->get();
        return $query;
    }

    public function select_count()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->selectCount('id');
        $query = $builder->get();
        return $query;
    }

    public function from()
    {
        $builder = $this->db->table('video_games_sales');
        $builder->select('Name');
        $builder->from('video_games_genre');
        $query = $builder->getCompiledSelect();
        return $query;
    }

    public function join()
    {
        /**
         * SELECT video_games_sales.Name, video_games_genre.genre_name
         * FROM video_games_sales
         * LEFT JOIN video_games_genre ON video_games_sales.Genre = video_games_genre.id
         */
        $builder = $this->db->table('video_games_sales');
        $builder->select('video_games_sales.Name, video_games_genre.genre_name');
        $builder->join('video_games_genre', 'video_games_sales.Genre = video_games_genre.id', 'left');
        $query = $builder->get(10, 0);
        return $query;
    }

    public function and_where()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform = 'PS3' AND Publisher = 'Ubisoft'
         */
        $builder = $this->db->table('video_games_sales');
        $builder->where('Platform', 'PS3');
        $builder->where('Publisher', 'Ubisoft');
        $query = $builder->get();
        return $query;
    }

    public function custom_key()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Critic_score > 80
         */
        $builder = $this->db->table('video_games_sales');
        $builder->where('Critic_score >', 80);
        $query = $builder->get();
        return $query;
    }

    public function associative_array()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform = 'PS3' AND Publisher = 'Ubisoft' AND Critic_Score > 80
         */
        $builder = $this->db->table('video_games_sales');
        $array = [
            'Platform' => 'PS3',
            'Publisher' => 'Ubisoft',
            'Critic_Score >' => 80,
        ];
        $builder->where($array);
        $query = $builder->get();
        return $query;
    }

    public function custom_string()
    {
        $builder = $this->db->table('video_games_sales');
        $where = "Platform='PS4' AND Publisher='Ubisoft' AND Critic_Score>80";
        $builder->where($where);
        $query = $builder->get();
        return $query;
    }

    public function subqueries()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Critic_Score < (SELECT AVG(Critic_Score) FROM video_games_sales)
         */
        $builder = $this->db->table('video_games_sales');
        $builder->where('Critic_Score <', function (BaseBuilder $builder) {
            return $builder->select('AVG(Critic_Score)', false)->from('video_games_sales');
        });
        $query = $builder->get();
        return $query;
    }

    public function or_where()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Genre = 1 OR Genre = 2
         */
        $builder = $this->db->table('video_games_sales');
        $builder->where('Genre', 1);
        $builder->orWhere('Genre', 2);
        $query = $builder->get();
        return $query;
    }

    public function where_in()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform IN ('PS4','PS3')
         */
        $builder = $this->db->table('video_games_sales');
        $platform = ['PS4', 'PS3'];
        $builder->whereIn('Platform', $platform);
        $query = $builder->get();
        return $query;
    }

    public function or_where_in()
    {
        $builder = $this->db->table('video_games_sales');
        $id = [3, 4, 5, 6];
        $builder->where('id', 1);
        $builder->orWhereIn('id', $id);
        $query = $builder->get();
        return $query;
    }

    public function where_not_in()
    {
        $builder = $this->db->table('video_games_sales');
        $platform = ['PS4', 'PS3'];
        $builder->whereNotIn('Platform', $platform);
        $query = $builder->get();
        return $query;
    }

    public function or_where_not_in()
    {
        $builder = $this->db->table('video_games_sales');
        $platform = ['PS4', 'PS3'];
        $builder->where('Publisher', 'Activision');
        $builder->orWhereNotIn('Platform', $platform);
        $query = $builder->get();
        return $query;
    }
    public function insert_contact()
    {
        $builder = $this->db->table('contact');
        $data = [
            'nama' => 'Dea Venditama',
            'email' => 'dea@gmail.com',
            'telp' => '911',
        ];

        $builder->insert($data);
        return $this->db->affectedRows();
    }
    // Jika Insert Data walapun id sama 
    public function insert_ignore_contact()
    {
        $builder = $this->db->table('contact');
        $data = [
            'id' => 1,
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'telp' => '110',
        ];

        $builder->ignore(true)->insert($data);
        return $this->db->affectedRows();
    }

    public function compiled_insert()
    {
        $data = [
            'nama' => 'Ani',
            'email' => 'ani@gmail.com',
            'telp' => '111',
        ];
        $builder = $this->db->table('contact');
        $sql = $builder->set($data)->getCompiledInsert();

        return $sql;
    }

    public function insert_batch()
    {
        $builder = $this->db->table('contact');
        $data = [
            [
                'nama' => 'Joni',
                'email' => 'joni@gmail.com',
                'telp' => '123',
            ],
            [
                'nama' => 'Susi',
                'email' => 'susi@gmail.com',
                'telp' => '321',
            ]
        ];
        $builder->insertBatch($data);
        return $this->db->affectedRows();
    }

    public function replacing()
    {
        $builder = $this->db->table('contact');
        $data = [
            'id' => 1,
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'telp' => '110',
        ];
        $builder->replace($data);
        return $this->db->affectedRows();
    }

    public function set_update()
    {
        $builder = $this->db->table('contact');
        $data = [
            'email' => 'budiwiliam@gmail.com',
        ];
        $builder->set($data);
        $builder->where('id', 1);
        $builder->update();
        return $this->db->affectedRows();
    }

    public function updating()
    {
        $builder = $this->db->table('contact');
        $data = [
            'nama' => 'Eren Yeager',
            'email' => 'eren@yeager.com',
        ];
        $builder->where('id', 1);
        $builder->update($data);
        return $this->db->affectedRows();
    }

    public function updating_2()
    {
        $builder = $this->db->table('contact');
        $data = [
            'nama' => 'Eren Yeager',
            'email' => 'eren@yeager.com',
        ];
        $builder->update($data, ['id' => 2]);
        return $this->db->affectedRows();
    }

    public function update_batch()
    {
        $builder = $this->db->table('contact');
        $data = [
            [
                'id' => 1,
                'nama' => 'Joni',
                'email' => 'joni@gmail.com',
                'telp' => '123',
            ],
            [
                'id' => 2,
                'nama' => 'Susi',
                'email' => 'susi@gmail.com',
                'telp' => '321',
            ]
        ];
        $builder->updateBatch($data, 'id');
        return $this->db->affectedRows();
    }

    public function compiled_update()
    {
        $data = [
            'nama' => 'Ani',
            'email' => 'ani@gmail.com',
            'telp' => '111',
        ];
        $builder = $this->db->table('contact');
        $builder->set($data);
        $builder->where('id', 1);
        $sql = $builder->getCompiledUpdate();

        return $sql;
    }
}