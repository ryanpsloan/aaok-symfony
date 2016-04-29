<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $state->getId() ?></td>
    </tr>
    <tr>
      <th>State name:</th>
      <td><?php echo $state->getStateName() ?></td>
    </tr>
    <tr>
      <th>State abbreviation:</th>
      <td><?php echo $state->getStateAbbreviation() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('state/edit?id='.$state->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('state/index') ?>">List</a>
