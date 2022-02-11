export default function BankSubMasterValidation(values, isTouched) {
  const errors = {}

  //vehicle type validation rule
  if (isTouched.bankName && values.bankName === '') {
    errors.bankName = 'Bank Name is Required'
  }

  return errors
}
