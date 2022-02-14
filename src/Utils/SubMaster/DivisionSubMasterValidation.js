export default function divisionSubMasterValidation(values, isTouched) {
  const errors = {}

  //vehicle type validation rule
  if (isTouched.division && !values.division) {
    errors.division = 'Division is required'
  } else if (isTouched.division && !/^[a-zA-Z ]+$/.test(values.division)) {
    errors.division = 'Division only have Letters and space'
  }

  return errors
}
