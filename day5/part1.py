import numpy as np

with open("input") as f:
    lines = [line.strip() for line in f]

empty_line = lines.index('')
lines_with_intervals = lines[:empty_line]
lines_with_numbers = lines[empty_line+1:]

intervals = np.array([list(map(int, interval.split("-"))) for interval in lines_with_intervals])
numbers = np.array([int(number) for number in lines_with_numbers])

left = intervals[:, 0]
right = intervals[:, 1]

result = np.array([np.any((number >= left) & (number <= right)) for number in numbers])

print("De code is: ", result.sum())