<?php
  global $base_url;

/**
 * @file
 * Default template for HTML Mail
 *
 * DO NOT EDIT THIS FILE. Copy it to your theme directory, and edit the copy.
 *
 * ========================================================= Begin instructions.
 *
 * When formatting an email message with a given $module and $key, [1]HTML
 * Mail will use the first template file it finds from the following list:
 *  1. htmlmail--$module--$key.tpl.php
 *  2. htmlmail--$module.tpl.php
 *  3. htmlmail.tpl.php
 *
 * For each filename, [2]HTML Mail looks first in the chosen Email theme
 * directory, then in its own module directory, before proceeding to the
 * next filename.
 *
 * For example, if example_module sends mail with:
 * drupal_mail("example_module", "outgoing_message" ...)
 *
 *
 * the possible template file names would be:
 *  1. htmlmail--example_module--outgoing_message.tpl.php
 *  2. htmlmail--example_module.tpl.php
 *  3. htmlmail.tpl.php
 *
 * Template files are cached, so remember to clear the cache by visiting
 * admin/config/development/performance after changing any .tpl.php files.
 *
 * The following variables available in this template:
 *
 * $body
 *        The message body text.
 *
 * $module
 *        The first argument to [3]drupal_mail(), which is, by convention,
 *        the machine-readable name of the sending module.
 *
 * $key
 *        The second argument to [4]drupal_mail(), which should give some
 *        indication of why this email is being sent.
 *
 * $message_id
 *        The email message id, which should be equal to
 *        "{$module}_{$key}".
 *
 * $headers
 *        An array of email (name => value) pairs.
 *
 * $from
 *        The configured sender address.
 *
 * $to
 *        The recipient email address.
 *
 * $subject
 *        The message subject line.
 *
 * $body
 *        The formatted message body.
 *
 * $language
 *        The language object for this message.
 *
 * $params
 *        Any module-specific parameters.
 *
 * $template_name
 *        The basename of the active template.
 *
 * $template_path
 *        The relative path to the template directory.
 *
 * $template_url
 *        The absolute URL to the template directory.
 *
 * $theme
 *        The name of the Email theme used to hold template files. If the
 *        [5]Echo module is enabled this theme will also be used to
 *        transform the message body into a fully-themed webpage.
 *
 * $theme_path
 *        The relative path to the selected Email theme directory.
 *
 * $theme_url
 *        The absolute URL to the selected Email theme directory.
 *
 * $debug
 *        TRUE to add some useful debugging info to the bottom of the
 *        message.
 *
 * Other modules may also add or modify theme variables by implementing a
 * MODULENAME_preprocess_htmlmail(&$variables) [6]hook function.
 *
 * References
 *
 * 1. http://drupal.org/project/htmlmail
 * 2. http://drupal.org/project/htmlmail
 * 3. http://api.drupal.org/api/drupal/includes--mail.inc/function/drupal_mail/7
 * 4. http://api.drupal.org/api/drupal/includes--mail.inc/function/drupal_mail/7
 * 5. http://drupal.org/project/echo
 * 6. http://api.drupal.org/api/drupal/modules--system--theme.api.php/function/hook_preprocess_HOOK/7
 *
 * =========================================================== End instructions.
 */
  $template_name = basename(__FILE__);
  $current_path = realpath(NULL);
  $current_len = strlen($current_path);
  $template_path = realpath(dirname(__FILE__));
  if (!strncmp($template_path, $current_path, $current_len)) {
    $template_path = substr($template_path, $current_len + 1);
  }
  $template_url = url($template_path, array('absolute' => TRUE));
?>

<div class="htmlmail-body">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border:solid #ccc 1px">
		<tr>
      <td style="border-bottom:solid #ccc 1px;">
        <table align="center" cellpadding="0" cellspacing="0" width="560">
          <tr>
            <td style="padding:15px 0"><img src="<?php echo $base_url; ?>/sites/default/files/logo_3.jpg" alt="Wipro Industrial Lighting" title="Wipro Industrial Lighting"></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td><?php echo $body; ?></td>
    </tr>
	</table>
</div>
