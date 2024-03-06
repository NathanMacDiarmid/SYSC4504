<!DOCTYPE html>

<!-- ANSWER XEADBAC -->

<html>

<head>

</head>

<body>
    <p>
    
		<?php
		
		/**
		 * Calculates the lock code based on student grades.
		 *
		 * This function takes an array of student grades and generates a lock code.
		 * Each grade range corresponds to a specific lock digit. The final digit is
		 * determined by the number of grades provided.
		 * The grades can go from A to F.
		 * A (90+), B (80+), C (70+), D(60+), E(40+), F( < 40)
		 *
		 * @param array $student_grades An array containing student grades.
		 * @return array An array representing the lock code.
		 */
		function door_lock($student_grades)
		{
			$lock[] = 'X';
		
			/*
				I didn't have time to finish this.
				However, at least I wrote the documenation for the function. 
			*/
			// Iterate over every element of the students_grades
			// and add their letter grade to $lock array.
			//....

			foreach ($student_grades as $grade) {
				if ($grade >= 90) {
					$lock[] = 'A';
				} elseif ($grade >= 80) {
					$lock[] = 'B';
				} elseif ($grade >= 70) {
					$lock[] = 'C';
				} elseif ($grade >= 60) {
					$lock[] = 'D';
				} elseif ($grade >= 40) {
					$lock[] = 'E';
				} else {
					$lock[] = 'F';
				}
			}
		
		
			if (count($lock) == 7) {
				$lock[] = 'A';
			} else {
				$lock[] = 'C';
			}
			return $lock;
		}
		
		$lock_digits = door_lock([40, 1000, 63, 80, 100]);
		foreach ($lock_digits as $digit) {
			printf("%s", $digit);
		}
		
		?>
	</p>

</body>

</html>