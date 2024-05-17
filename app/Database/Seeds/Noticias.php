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
                'nombre_usuario' => 'camila',
                'titulo' => 'La IA Generativa no se parece a ninguna tecnología anterior',
                'descripcion'=>'La IA Generativa está transformando rápidamente los negocios y la sociedad, obligando a las organizaciones a repensar sus planes y estrategias en tiempo real. En Argentina, la IA Generativa acompañará a las personas en sus experiencias digitales. La hiperpersonalización es clave, y no se trata solamente de interacciones personalizadas, sino intuitivas y ofrecer lo que los usuarios quieren, incluso antes de que lo soliciten. En un estudio de la empresa, los ejecutivos globales dijeron que la inteligencia artificial generativa es la principal tendencia que esperan que altere la forma en que sus organizaciones diseñan experiencias en el futuro. Y, en América Latina, 50% de los CEO asegura que la IA es la tecnología clave que les ayudará a entregar resultados en los próximos tres años.',
                'fecha_creacion' => '2024-04-28',
                'estado'=>'publicado',
                'categoria'=>'Innovaciones y Lanzamientos',
                'imagen'=>'ia-generativa.png',
                'nombrePublicador'=>'sofia',
                'fecha_publicacion'=>'2024-05-10',
                'estado1'=>'Activo',
            ],
            [
                'id'=>'10053',
                'nombre_usuario' => 'camila',
                'titulo' => 'Los ciberataques crecen exponencialmente, mientras los ciberdelincuentes se sofistican',
                'descripcion'=>'Estamos en la era del Phishing 3.0 en la que atacantes con nivel inicial ejecutan ataques personalizados. Los ciberdelincuentes están jugando el juego largo, deshaciéndose de los datos de las tarjetas de crédito para apuntar a la información personal, incluyendo direcciones de correo electrónico, números de teléfono e incluso direcciones del domicilio, que entregan mayor pago en el futuro.
                Con IA, los ciberdelincuentes están creando, incluso, deepfakes, que son imágenes, videos y audio generados por IA pueden crear imitaciones realistas de otras personas, lo que facilita que los atacantes ganen confianza y engañen a sus objetivos.
                
                Y, a nivel empresarial, los ciberataques están a la orden del día. De acuerdo con un estudio de IBM, en Latinoamérica, el costo promedio de una filtración de datos alcanzó los 2,46 millones de dólares en 2023, 76% más que en 2020. Y, para 2030, las computadoras cuánticas podrían ser capaces de descifrar algunos de los métodos comúnmente utilizados para el cifrado de datos. Para limitar su exposición al riesgo, las empresas necesitan explorar nuevos enfoques de la ciberseguridad.
                ',
                'fecha_creacion' => '2024-05-10',
                'estado'=>'publicado',
                'categoria'=>'Casos de Éxito',
                'imagen'=>'ciberseguridad.png',
                'nombrePublicador'=>'sofia',
                'fecha_publicacion'=>'2024-05-15',
                'estado1'=>'Descativado',
            ],
            [
                'id'=>'10054',
                'nombre_usuario' => 'camila',
                'titulo' => 'El crecimiento en jaque por la escasez de talento en tecnología',
                'descripcion'=>'Globalmente, los empleadores de todo el mundo están luchando por cubrir puestos vacantes, y se espera que 85 millones de puestos de trabajo queden sin cubrir para 2030, según Korn Ferry, que además estima que este déficit de mano de obra podría traducirse en aproximadamente 8,5 billones de dólares en ingresos anuales no realizados en el mismo período.

                El surgimiento de tecnologías como la IA Generativa también está trayendo nuevas oportunidades laborales. 46% de los CEO encuestados en Estados Unidos por la multinacional, ha contratado a trabajadores adicionales debido a la IA generativa, con el 26% de ellos afirmando que tienen planes para más contrataciones por delante. Es clave que las empresas continúen innovando para crear valor para su talento. Esto les ayudará pasar de la reacción a la acción en el largo plazo.',
                'fecha_creacion' => '2024-05-15',
                'estado'=>'Borrador',
                'categoria'=>'Tendencias del Sector',
                'imagen'=>'crecimiento.png',
                'nombrePublicador'=>'',
                'fecha_publicacion'=>'',
                'estado1'=>'',
            ],
            [
                'id'=>'10055',
                'nombre_usuario' => 'nicolas',
                'titulo' => 'ExpoTécnica sobre Energías, Telecomunicaciones y Servicios',
                'descripcion'=>'La ExpoTécnica sobre Energías, Telecomunicaciones y Servicios, ha logrado a lo largo de su trayectoria un nivel de excelencia que la convierten en la principal concentración de empresas proveedoras y gerentes, profesionales y operadores técnicos de cooperativas, pymes, parques industriales y municipios de una amplia región del país.

                Surgió hace varios años, merced a la necesidad de los planteles operativos de estos organismos, que reclamaron sistemas de actualización ante el crecimiento y los permanentes cambios que presentan las tecnologías modernas.',
                'fecha_creacion' => '2024-04-28',
                'estado'=>'publicado',
                'categoria'=>'Eventos y Conferencias',
                'imagen'=>'expotecnica.png',
                'nombrePublicador'=>'nicolas',
                'fecha_publicacion'=>'2024-05-10',
                'estado1'=>'Desactivado',
            ],
            [
                'id'=>'10056',
                'nombre_usuario' => 'nicolas',
                'titulo' => 'Seguriexpo Buenos Aires: la feria',
                'descripcion'=>'Las empresas especializadas en seguridad se dan cita en Seguriexpo Buenos Aires para mostrar sus productos y servicios a todas aquellas entidades públicas y privadas que trabajan en el ramo o que desean salvaguardar la integridad de su personal y de sus documentos.

                La seguridad física, laboral, electrónica, informática, industrial o la protección del Medio Ambiente son algunos de los sectores que están representados en este salón de alcance internacional.',
                'fecha_creacion' => '2024-04-28',
                'estado'=>'publicado',
                'categoria'=>'Eventos y Conferencias',
                'imagen'=>'expo.png',
                'nombrePublicador'=>'sofia',
                'fecha_publicacion'=>'2024-05-10',
                'estado1'=>'Activo',
            ],
            [
                'id'=>'10060',
                'nombre_usuario' => 'camila',
                'titulo' => 'Por qué la tecnología puede resolver uno de los principales desafíos de la industria del litio',
                'descripcion'=>'El triángulo del litio, conformado por Argentina, Chile y Bolivia, emerge como una región de vital importancia en el escenario mundial, ya que concentra el 53,4% de los recursos globales de litio, según un informe de la Secretaría de Energía de la Nación. Esto posiciona a la región como un epicentro estratégico para la producción de litio, pero con esta oportunidad también surgen desafíos.

                En el país se encuentran identificados 20 millones de toneladas de litio metálico, ubicados en la Puna argentina. Sin embargo, de esa totalidad de recursos, tan sólo 2,7 millones de toneladas de litio metálico cuentan con estudios económicos que aseguran su explotación y son consideradas reservas. En el ranking mundial, estos números nos posicionan como terceros en reservas de litio y segundos en recursos.
                
                La Argentina se prepara para aprovechar una oportunidad única y posicionarse en el mercado global de este mineral estratégico y, aunque el precio de mercado cayó, los márgenes de renta continúan siendo favorables.',
                'fecha_creacion' => '2024-05-11',
                'estado'=>'Borrador',
                'categoria'=>'Casos de Éxito',
                'imagen'=>'litio.png',
                'nombrePublicador'=>'',
                'fecha_publicacion'=>'',
                'estado1'=>'',
            ],
            [
                'id'=>'10061',
                'nombre_usuario' => 'camila',
                'titulo' => 'OpenAI lanza en abierto ChatGPT-4o, una versión mejorada de ChatGPT',
                'descripcion'=>'Estamos en la era del Phishing 3.0 en la que atacantes con nivel inicial ejecutan ataques personalizados. Los ciberdelincuentes están jugando el juego largo, deshaciéndose de los datos de las tarjetas de crédito para apuntar a la información personal, incluyendo direcciones de correo electrónico, números de teléfono e incluso direcciones del domicilio, que entregan mayor pago en el futuro.
                Con IA, los ciberdelincuentes están creando, incluso, deepfakes, que son imágenes, videos y audio generados por IA pueden crear imitaciones realistas de otras personas, lo que facilita que los atacantes ganen confianza y engañen a sus objetivos.
                
                Y, a nivel empresarial, los ciberataques están a la orden del día. De acuerdo con un estudio de IBM, en Latinoamérica, el costo promedio de una filtración de datos alcanzó los 2,46 millones de dólares en 2023, 76% más que en 2020. Y, para 2030, las computadoras cuánticas podrían ser capaces de descifrar algunos de los métodos comúnmente utilizados para el cifrado de datos. Para limitar su exposición al riesgo, las empresas necesitan explorar nuevos enfoques de la ciberseguridad.
                ',
                'fecha_creacion' => '2024-05-10',
                'estado'=>'Validar',
                'categoria'=>'Casos de Éxito',
                'imagen'=>'gpt.png',
                'nombrePublicador'=>'',
                'fecha_publicacion'=>'',
                'estado1'=>'',
                
            ],
            [
                'id'=>'10062',
                'nombre_usuario' => 'camila',
                'titulo' => 'El crecimiento en jaque por la escasez de talento en tecnología',
                'descripcion'=>'OpenAI, la empresa responsable de ChatGPT, ha anunciado hoy el lanzamiento de ChatGPT-4o. Se trata de una versión de ChatGPT 4.0, la versión más avanzada del chatbot conversacional que inauguró la carrera por la inteligencia artificial (IA) generativa. Con una diferencia: ChatGPT-4o será gratuita, mientras que la versión 4.0 es de pago. Así lo ha asegurado la directora de tecnología de la compañía, Mira Murati, en un evento corporativo que había levantado muchas expectativas.',
                'fecha_creacion' => '2024-05-14',
                'estado'=>'Validar',
                'categoria'=>'Tendencias del Sector',
                'imagen'=>'compu.png',
                'nombrePublicador'=>'',
                'fecha_publicacion'=>'',
                'estado1'=>'',
                
            ],
            [
                'id'=>'10066',
                'nombre_usuario' => 'camila',
                'titulo' => 'Empresa líder en tecnología ofrece cursos gratuitos en programación: Cómo inscribirse',
                'descripcion'=>'En la actualidad, la tecnología está presente en cada aspecto de nuestra vida diaria, lo que hace que dominarla sea sumamente beneficioso. Por esta razón, la opción de inscribirse en cursos o recibir capacitación para entenderla se perfila como una de las mejores alternativas, y si estos recursos son gratuitos y ofrecen la flexibilidad de ajustarse a nuestros horarios, no queda ninguna excusa para no aprovecharlos.
                En esta ocasión, Santex, una destacada empresa global en el ámbito del desarrollo de software, en colaboración con la Fundación Tecnología con Propósito (Technology with Purpose Foundation), lanzó una nueva edición de su programa XAcademy. El cuál tiene como finalidad capacitar a jóvenes en programación y pruebas de software, promoviendo así su incorporación en el sector de la tecnología de la información.',
                'fecha_creacion' => '2024-04-28',
                'estado'=>'publicado',
                'categoria'=>'Eventos y Conferencias',
                'imagen'=>'cursos.png',
                'nombrePublicador'=>'sofia',
                'fecha_publicacion'=>'2024-05-10',
                'estado1'=>'Activo',
            ],
            [
                'id'=>'10085',
                'nombre_usuario' => 'nicolas',
                'titulo' => 'La función que suma TikTok para los interesados en la tecnología y la ciencia',
                'descripcion'=>'El ‘feed’ STEM se diseñó como un espacio donde descubrir nuevos vídeos de contenidos científicos y tecnológicos.

                Se ha conseguido este lugar a raíz de una asociación con Common Sense Networks y Poynter para garantizar que el contenido es apropiado y la información fiable.',
                'fecha_creacion' => '2024-04-28',
                'estado'=>'publicado',
                'categoria'=>'Eventos y Conferencias',
                'imagen'=>'tiktok.png',
                'nombrePublicador'=>'sofia',
                'fecha_publicacion'=>'2024-05-10',
                'estado1'=>'Activo',
            ],
        ];
        
        $this -> db -> table('noticias')-> insertBatch($data);
    }
}