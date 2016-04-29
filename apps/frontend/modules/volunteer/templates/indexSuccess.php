<h1>Volunteer List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Last name</th>
      <th>First name</th>
      <th>Address line</th>
      <th>City</th>
      <th>State</th>
      <th>Zipcode</th>
      <th>Telephone home</th>
      <th>Telephone cell</th>
      <th>Telephone work</th>
      <th>Email</th>
      <th>Church</th>
      <th>City area</th>
      <th>Service</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($volunteer_list as $volunteer): ?>
    <tr>
      <td><a href="<?php echo url_for('volunteer/show?id='.$volunteer->getId()) ?>"><?php echo $volunteer->getId() ?></a></td>
      <td><?php echo $volunteer->getLastName() ?></td>
      <td><?php echo $volunteer->getFirstName() ?></td>
      <td><?php echo $volunteer->getAddressLine() ?></td>
      <td><?php echo $volunteer->getCityId() ?></td>
      <td><?php echo $volunteer->getStateId() ?></td>
      <td><?php echo $volunteer->getZipcodeId() ?></td>
      <td><?php echo $volunteer->getTelephoneHome() ?></td>
      <td><?php echo $volunteer->getTelephoneCell() ?></td>
      <td><?php echo $volunteer->getTelephoneWork() ?></td>
      <td><?php echo $volunteer->getEmail() ?></td>
      <td><?php echo $volunteer->getChurch() ?></td>
      <td><?php echo $volunteer->getCityArea() ?></td>
      <td><?php echo $volunteer->getServiceId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('volunteer/new') ?>">New</a>
