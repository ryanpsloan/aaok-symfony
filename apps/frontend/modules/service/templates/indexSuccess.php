<h1>Service List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Service name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($service_list as $service): ?>
    <tr>
      <td><a href="<?php echo url_for('service/show?id='.$service->getId()) ?>"><?php echo $service->getId() ?></a></td>
      <td><?php echo $service->getServiceName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('service/new') ?>">New</a>
