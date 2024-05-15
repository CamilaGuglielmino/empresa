<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Noticias extends Seeder
{
    public function run()
    {
        $data =[
            [
                'id'=>'10052',
                'nombre_usuario' => 'sofia',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'fecha_correccion'=>'2024-04-29',
                'fecha_publicacion'=>'2024-05-03',
                'estado'=>'publicado',
                'categoria'=>'Innovaciones y Lanzamientos',
                'imagen'=>'',
            ],
            [
                'id'=>'10053',
                'nombre_usuario' => 'camila',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'fecha_correccion'=>'2024-04-29',
                'fecha_publicacion'=>'2024-05-03',
                'estado'=>'publicado',
                'categoria'=>'Casos de Éxito',
                'imagen'=>'',
            ],
            [
                'id'=>'10054',
                'nombre_usuario' => 'camila',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'fecha_correccion'=>'2024-04-29',
                'fecha_publicacion'=>'2024-05-03',
                'estado'=>'publicado',
                'categoria'=>'Eventos y Conferencias',
                'imagen'=>'',
            ],
            [
                'id'=>'10055',
                'nombre_usuario' => 'sofia',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'fecha_correccion'=>'2024-04-29',
                'fecha_publicacion'=>'2024-05-03',
                'estado'=>'publicado',
                'categoria'=>'Innovaciones y Lanzamientos',
                'imagen'=>'',
            ],
            [
                'id'=>'10056',
                'nombre_usuario' => 'camila',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'fecha_correccion'=>'2024-04-29',
                'fecha_publicacion'=>'2024-05-03',
                'estado'=>'publicado',
                'categoria'=>'Tendencias del Sector',
                'imagen'=>'',
            ],
        ];
        
        $this -> db -> table('noticias')-> insertBatch($data);
    }
}
