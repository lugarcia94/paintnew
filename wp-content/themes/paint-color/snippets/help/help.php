<?php 
    $mail1 = get_theme_mod( 'email_1' );
	$mail2 = get_theme_mod( 'email_2' );
	$mail3 = get_theme_mod( 'email_3' );
	$mail4 = get_theme_mod( 'email_4' );
	$tel1 = get_theme_mod( 'tel_1' );
	$tel2 = get_theme_mod( 'tel_2' );
	$whatsapp = get_theme_mod( 'whatsapp' );
	$whatsappLink = get_theme_mod( 'whatsapp_link' );
	$dados = get_theme_mod( 'dados_empresa' );
	$endereco = get_theme_mod( 'endereco' );
	$horario = get_theme_mod( 'horario_atendimento' );
;?>

<div class="help_content">
    <div class="help_content--block">
        <h3>Fale conosco</h3>
        <ul class="help_content--contacts">
            <li>
                <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsappLink;?>" target="_blank" title="">
                    <svg class="icon icon-help-whats"><use xlink:href="#icon-help-whats"></use></svg>
                    <span><?php echo $whatsapp;?></span>
                </a>
            </li>
            <li>
                <svg class="icon icon-help-phone"><use xlink:href="#icon-help-phone"></use></svg>
                <span><?php echo $tel1;?></span>
            </li>
            <li>
                <a href="mailto:<?php echo $mail1;?>">
                    <svg class="icon icon-help-mail"><use xlink:href="#icon-help-mail"></use></svg>
                    <span><?php echo $mail1;?></span>
                </a>
            </li>
        </ul>
    </div>

    <div class="help_content--block">
        <h3>Horário de funcionamento</h3>
        <p><?php echo $horario ;?></p>
    </div>
    
    <div class="help_content--block">
        <h3>Precisa de ajuda?</h3>
        <p>Acesse nosso FAQ e veja se encontra sua dúvida.</p>
        <a href="#" class="faq_link">Acessar FAQ</a>
    </div>
</div>