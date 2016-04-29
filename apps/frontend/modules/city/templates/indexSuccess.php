<h1>City List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>City name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($city_list as $city): ?>
    <tr>
      <td><a href="<?php echo url_for('city/show?id='.$city->getId()) ?>"><?php echo $city->getId() ?></a></td>
      <td><?php echo $city->getCityName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('city/new') ?>">New</a>
