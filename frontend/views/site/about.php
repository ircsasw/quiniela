<?php

/** @var yii\web\View $this */

$this->title = 'Acerca de';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <img alt="IRCSA" src="<?= Yii::getAlias('@logo')?>/img/logo-IRCSA_riot.png" class="center-block img-responsive" width="300" />
            </div>

            <ul class="timeline">
                <li>
                    <div class="timeline-image visible-lg">
                        <img class="img-circle img-responsive fas fa-code-branch" src="<?= Yii::getAlias('@logo')?>/img/question-sign.png" width="200"  alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">¿Lo que hacemos?</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Desde hace más de 20 años nos dedicamos al análisis, diseño y desarrollo de aplicaciones
                                web, de escritorio y sitios web para la pequeña y mediana empresa así como a la
                                consultoría, asistencia y capacitación en los recursos informáticos.
                            </p>
                        </div>
                    </div>
                    <div class="line"></div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image visible-lg">
                        <img class="img-circle img-responsive fas fa-code-branch" src="<?= Yii::getAlias('@logo')?>/img/artificial-intelligence.png" width="190"  alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Nuestra Razón de Ser</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                            Crear soluciones integrales que ayuden a nuestros clientes a mejorar: el flujo de su
                            información, la automatización y la gestión de sus servicios satisfaciendo sus necesidades.</p>
                        </div>
                    </div>
                    <div class="line"></div>
                </li>
                <li>
                    <div class="timeline-image visible-lg">
                        <img class="img-circle img-responsive" src="<?= Yii::getAlias('@logo')?>/img/teamwork.png" width="190"  alt="">
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Nuestro ideal</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                            Ser la empresa elegida por sus servicios, soluciones y productos innovadores.
                            Que nuestros clientes se sientan seguros de confiarnos sus necesidades por el trato
                            profesional y la calidad humana de nuestra gente; y que éstos se sientan motivados a
                            participar en el desarrollo de la empresa contribuyendo al crecimiento de nuestra comunidad.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
