<h1>State List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>State name</th>
      <th>State abbreviation</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($state_list as $state): ?>
    <tr>
      <td><a href="<?php echo url_for('state/show?id='.$state->getId()) ?>"><?php echo $state->getId() ?></a></td>
      <td><?php echo $state->getStateName() ?></td>
      <td><?php echo $state->getStateAbbreviation() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('state/new') ?>">New</a>
