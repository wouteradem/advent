import numpy as np

from scipy.signal import convolve2d

with open("dataset") as f:
   lines = [line.strip() for line in f]

grid = np.array([[1 if c == '@' else 0 for c in row] for row in lines])

start_grid = grid.copy()
kernel = np.ones((3, 3), dtype=int)

while True:
   conv = convolve2d(grid, kernel, mode='same', boundary='fill', fillvalue=0)
   can_remove_roll = (grid == 1) & (conv <= 4)
   if not can_remove_roll.any():
       break
   grid[can_remove_roll] = 0

end_grid = grid
nr_of_removed_rolls = start_grid.sum() - end_grid.sum()

print("De code is:", nr_of_removed_rolls)
