<?php echo $this->extend('Admin/layout/principal') ?>

<?php echo $this->section('titulo') ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>


<?php echo $this->section('estilos'); ?>
    
    <!--Aqui enviamos para o template principal os stilos -->

<?php echo $this->endSection() ?>



<?php echo $this->section('conteudo'); ?>
    
    <?php echo $titulo; ?>

<?php echo $this->endSection() ?>


<?php echo $this->section('script'); ?>
    
    <!--Aqui enviamos para o template principal os script -->

<?php echo $this->endSection() ?>
