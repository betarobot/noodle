<table id="forum-topic-<?php print $topic_id; ?>">
  <thead>
    <tr><?php print $header; ?></tr>
  </thead>
  <tbody>
  <?php foreach ($topics as $topic): ?>
    <tr class="<?php print $topic->zebra;?>">
      <td class="icon"><?php print $topic->icon; ?></td>
      <td class="title"><?php print $topic->title; ?></td>
    <?php if ($topic->moved): ?>
      <td colspan="3"><?php print $topic->message; ?></td>
    <?php else: ?>
      <td class="replies">
        <?php print $topic->num_comments; ?>
        <?php if ($topic->new_replies): ?>
          <br />
          <a href="<?php print $topic->new_url; ?>"><?php print $topic->new_text; ?></a>
        <?php endif; ?>
      </td>
      <td class="created"><?php print $topic->created; ?></td>
      <td class="last-reply"><?php print $topic->last_reply; ?></td>
    <?php endif; ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php print $pager; ?>
