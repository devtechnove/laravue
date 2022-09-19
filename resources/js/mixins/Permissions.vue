<script>
  export default {
    methods: {
      $can(permissionName) {
        return window.Permissions.indexOf(permissionName) !== -1;
      },
    },
  };
</script>