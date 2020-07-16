<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'paint' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eX(5q<yuG)$8Tk=4Jy}?rZ0#qXyVMSNe{OtfrV *R~)z% Nfq&*^?z^C4(j*pQ@R' );
define( 'SECURE_AUTH_KEY',  '#;-s>&Ft[/%}u9]E`;bs9l%u`^C8{}$ent1+SS!#y)if.u.qK)/1=AQp0R({oR91' );
define( 'LOGGED_IN_KEY',    'RHSk{3j#D07^!waoztjOB rPm46Jc))?LYvot~r:aAU%5`(`WW}P~r)Dl?M[Env(' );
define( 'NONCE_KEY',        'X95c8&b=-U{IPs4$L%/~Zy7Pltil2bko)q]LCm+yrmJ%3j~5Tgi=aFH{<t!iXI1S' );
define( 'AUTH_SALT',        '?H3lKE,2ADWGu@.9SuzTSTz+$qc=hc;`Ng*3!YPt#w+c1CVVas2}jv!`gNEkV7$m' );
define( 'SECURE_AUTH_SALT', 'h$g9Z|mMl-IGkn~~Pz?%Yzk61YzN1$xu&Y1C[[A!>rW<-COLC)U7wQ+(vY5hc7qv' );
define( 'LOGGED_IN_SALT',   '.l4i@Hjoh8dF0C^I;Qa{L4k) [-BSaH&XO5[H}>#n8?fRO{T;Dy+://I_5[|7tOY' );
define( 'NONCE_SALT',       'w2AI#e:M[v`e5<a|wiVZNO%+<TOl/zHX.x(.L^#cHZ~a<!@kX?!ARThFT,D*cA|3' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
