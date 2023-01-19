# Matrices
Program serves for calculation of matrices, currently supported operations are:
- addition (sum)
  - requires 2 parameters (matrix num1 and matrix num2)
  - example:
    - input: http://localhost/matrices.php/?operation=sum&num1=2,3,4;1,0,5&num2=3,1,1;0,0,3
    - output: {"status":"OK","result":[[5,4,5],[1,0,8]]}
 - scalar multiplication (scalmul)
   - requires 2 parameters (matrix num1 and number num2)
   - example:
     - input: http://localhost:4000/matrices.php/?operation=scalmul&num1=2,3,4;1,0,5&num2=2
     - output: {"status":"OK","result":[[4,6,8],[2,0,10]]}
- transposition (transposition)
  - requires 1 parameter (matrix num1)
    - example:
      - input: http://localhost:4000/matrices.php/?operation=transposition&num1=2,3,4;1,0,5
      - output: {"status":"OK","result":[[2,1],[3,0],[4,5]]}

matrices are written by dividing every element of matrix with , and every row by ;
example: 2,5,6;1,3,2;9,0,1

