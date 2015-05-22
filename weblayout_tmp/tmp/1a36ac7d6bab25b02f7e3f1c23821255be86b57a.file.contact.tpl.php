<?php /* Smarty version Smarty-3.1.17, created on 2015-05-22 17:18:10
         compiled from "tpl\contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201154bcffebdb6ff3-55615036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a36ac7d6bab25b02f7e3f1c23821255be86b57a' => 
    array (
      0 => 'tpl\\contact.tpl',
      1 => 1431947772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201154bcffebdb6ff3-55615036',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_54bcffebe10d83_83109928',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54bcffebe10d83_83109928')) {function content_54bcffebe10d83_83109928($_smarty_tpl) {?>
        <div id="home">
        <center>
            <div class="header">
                ask your questions
            </div>
        </center>
        <br />

        <table id="contact">
            <tr>
                <td>
                    <div id="faq">
                        <table width="400">
                            <tr>
                                <td>
                                    <p class="question">What does this side do?</p>
                                    <p class="answer">
                                        This website lets you browser all registrated servers and join them by just one simple click. You can also create a dynamic, good looking server banner for your own website. All this is for free of course.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p class="question">How can i create a server banner?</p>
                                    <p class="answer">
                                        Just simply go onto the tab "Banner" or go to the serverlist and right click on the server you want to create a banner of and click "create a banner". If you chose the first way, put in the IP adress and the Port number and copy the code of the banner you want.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p class="question">What do the banners show?</p>
                                    <p class="answer">
                                        You can choose. There are smaller banners with only the basic informations like the servername, the amount of players online, the ping and so on. Then there are some bigger banners, which also show the player names or some diagramms about the usage of the servers.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p class="question">Who are you guys?</p>
                                    <p class="answer">
                                        We are a group of 4 pupils who made this website as their project in school.
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <p class="question">How can you support us?</p>
                                    <p class="answer">
                                        Just press the donate button, we are happy about every donation.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div id="form">
                        <table>
                            <tr>
                                <td>
                                    <p class="q">Fill out this form and we'll get in touch as soon as possible</p>
                                </td>
                            </tr>
                            <tr>
							<form action="" method="post">
                                <td align="center"><br />
                                <input type="text" name="email" value="email" class="inputs_txt" onclick="this.value=''" /></td>
                            </tr>
                            <tr>
                                <td align="center"><br />
                                <input type="text" name="subject" value="subject" class="inputs_txt" onclick="this.value=''" /></td>
                            </tr>
                            <tr>
                                <td align="center"><br />
                                <textarea name="message" rows="25" cols="25" class="inputs_txtarea" onclick="this.value=''">message</textarea></td>
                            </tr>
							<tr>
								<td align="center"><br />
								<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</td>
							</tr>
                            <tr>
                                <td align="center"><br />
                                <input type="submit" name="send" value="send" class="inputs_send" /></td>
								</form>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>

<?php }} ?>
