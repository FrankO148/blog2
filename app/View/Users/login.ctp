<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<?php echo $this->Flash->render('auth'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <h4>Welcome back.</h4>
            <?php echo $this->Form->create('User'); ?>
            <!--<input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />-->
            <?php echo $this->Form->input('username',array('class'=> 'form-control input-sm chat-input', 'placeholder'=>'username')); ?>
            </br>
            <!--<input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />-->
            <?php echo $this->Form->input('password',array('class'=> 'form-control input-sm chat-input', 'placeholder'=>'password')); ?>
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <?php echo $this->Form->end(__('Login')); ?>
            </span>
            </div>
            </div>
        
        </div>
    </div>
</div>