<div id="form">
		<h1> Report a problem </h1>
		<form action="" method="post">
			<table>
				<tr>
				<td>
					<h4><p class="q">Which of the following applies best to the problem that you are reporting?</p></h4>
				</td></tr>


					<tr><td>
					<input type="checkbox" name="opt1" value="send" />
					Report illegal or inappropriate content
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt2" value="send" />
					Book Description does not correspond to the book content
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt3" value="send" />
					The content is displayed incorrectly
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt4" value="send" />
					Unfitting picture to the book
					</td></tr>

					<tr><td align="left"><br />
					<input type="checkbox" name="opt5" id="click" value="send" onclick="showDiv1();" />
					Write your own message
					</td></tr>

					<tr><td>
					<textarea name="message" rows="5" cols="86" id="welcomeDiv1" onclick="this.value=''"></textarea>
					</td></tr>

					<tr><td align="center"><br />
					{if $err != ""}{$err}{/if}</td>
					</tr>

					<tr><td align="center"><br />
					<input type="submit" name="send" value="send" class="inputs_send" />
					<br /><br /> {if $endingmessage != ""}{$endingmessage}{/if}
				</form>
				</td></tr>
			</table>
		</div>             